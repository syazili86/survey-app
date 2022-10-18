@extends('layouts.main')

@section('title', 'Enrol')

@section('content')
  <div class="card m-2">
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <ul class="nav nav-tabs" id="myTab" role="tablist">
      @foreach ($semester as $key => $item)
        <li class="nav-item" role="presentation">
          <button class="nav-link  {{$key == 0 ? 'active': ''}}" id="nav-tab{{$item}}" data-bs-toggle="tab" data-bs-target="#tab{{$item}}" type="button" role="tab" aria-controls="tab{{$item}}" aria-selected="true">Semester {{$item}}</button>
        </li>
      @endforeach
    </ul>
    <div class="tab-content" id="myTabContent">   
      @foreach ($semester as $key => $item) 
        <div class="tab-pane fade {{$key == 0 ? 'show active': ''}}" id="tab{{$item}}" role="tabpanel" aria-labelledby="nav-tab{{$item}}">
          
          <div class="row" style="margin: unset !important;">
            @foreach ($enrol as $key => $enrolItem) 
              @if($enrolItem->Semester == $item)
                  <div class="col-sm-3 my-2">
                    <div class="card" style="height: 100%;">
                      <div class="card-body">
                        <h5 class="card-title">{{$enrolItem->Desk}} ({{$enrolItem->SubjectsCode}})</h5>
                        
                        <table width="100%">
                          <tr>
                            <td>Dosen</td>
                            <td>:</td>
                            <td>{{$enrolItem->LectureName}}</td>
                          </tr>
                          <tr>
                            <td>SKS</td>
                            <td>:</td>
                            <td>{{floatval($enrolItem->SCU)}}</td>
                          </tr>
                          <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>{{$enrolItem->ClassCode}}</td>
                          </tr>
                        </table>

                      </div>
                      <div class="card-footer bg-transparent">
                        @if(!$enrolItem->surveyid)
                        <div class="text-end">
                          <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button" onclick="change('{{$enrolItem->EnrollID}}')">Beri Survey / Tanggapan</a>
                        </div>

                        <div class="modal fade" id="exampleModalToggle" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleLabel">Beri Survey atau Tanggapan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="post">
                                @csrf
                                <div class="modal-body">
                                  <div class="mb-3">
                                    <input type="hidden" name="enrollid" value="" readonly>
                                    <select class="form-select" aria-label="Default select example" name="surveyid">
                                      <option value="">Pilih Tanggapan Anda</option>

                                      @foreach($survey as $itemSurvey)
                                      <option value="{{$itemSurvey->id}}">{{$itemSurvey->ratingName}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="form-control btn btn-primary btn-block mb-4">Simpan</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        @endif
                      </div>
                    </div>
                  </div>
              @endif
            @endforeach
          </div>
        </div>
      @endforeach
    </div>
  </div>
@stop

<script>
  function change(id){
    var els=document.getElementsByName("enrollid");
    for (var i=0;i<els.length;i++) {els[i].value = id}
  }
</script>