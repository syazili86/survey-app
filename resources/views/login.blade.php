@extends('layouts.main')

@section('title', 'Mahasiswa')

@section('content')
<div class="vh-100 d-flex justify-content-center align-items-center">
    <div style="width: 400px;">
        <h1 class="h3 text-center pb-4">Portal Survey Perkuliahan Mahasiswa</h1>

        @isset($error)
        @if ($error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endif
        @endisset

        <form method="POST">
            @csrf
            <div class="form-outline mb-4">
                <label class="form-label" for="nim">NIM</label>
                <input type="text" id="nim" name="nim" class="form-control" />
                @if ($errors->has('nim'))
                <span class="text-danger">{{ $errors->first('nim') }}</span>
                @endif
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" />
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <button type="submit" class="form-control btn btn-primary btn-block mb-4">Cari</button>

            <div class="text-center">
                <p>Not a member? <a href="https://www.binadarma.ac.id/pendaftaran/" target="blank">Register</a></p>
            </div>
        </form>
    </div>
</div>
@stop