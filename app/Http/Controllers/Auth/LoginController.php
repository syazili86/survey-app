<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller{
  public function index(){
    return view('login');
  }

  public function doAuth(Request $request){
    $this->validate($request,[
      'nim' => 'required',
      'password' => 'required'
    ]);

    $data = User::where('usercode', $request->nim)->where('UserCatogoriesID', 1)->first();

    if(!isset($data->UserPassword) || md5($request->password) !== $data->UserPassword){
      return view('login', ['error'=>'Data tidak ditemukan']);
    }

    $request->session()->regenerate();
    $request->session()->put('id', $data->Userid);
    $request->session()->put('fullname', $data->UseridFirstName." ".$data->LastName);

    return redirect('/enrol');
  }

  public function logout(){
      request()->session()->invalidate();
      request()->session()->regenerateToken();
      return redirect('/');
  }
}