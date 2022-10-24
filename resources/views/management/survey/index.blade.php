@extends('layouts.main')

@section('title', 'Questions of Survey')

@section('content')
  <div class="card m-4">
    <div class="card-body">
      <div class="card-title"><h5>Questions of Survey</h5></div>

      <div class="card-text">
        <div class="row">
          @foreach($data as $key => $category)
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title">
                  <div class="row">
                    <div class="col-sm-8">
                      <strong>{{$category->name}}</strong>
                    </div>
                    <div class="col-sm-4 text-end">
                      <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" href="#modalCategory">Update</button>
                    </div>
                  </div>
                </div>

                <div class="card-text">
                  <table class="table table-sm table-striped">
                    <thead>
                        <th>Opsi</th>
                        <th>Nilai</th>
                    </thead>
                    @foreach(json_decode($category->options) as $keyOptions => $options)
                      <tr>
                        <td>{{$options->item}}</td>
                        <td>{{$options->value}}</td>
                      </tr>
                    @endforeach
                  </table>
                  
                  <div class="row">
                    <div class="col-sm-8">
                      <strong>Pertanyaan</strong>
                    </div>
                    <div class="col-sm-4 text-end">
                      <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" href="#exampleModalToggle">Tambah</button>
                    </div>
                  </div>

                  <table class="table table-sm table-striped">
                    @foreach($category->surveys as $keySurvey => $survey)
                      <tr>
                        <td>{{$keySurvey+1}}</td>
                        <td>{{$survey->name}}</td>
                        <td><button class="btn btn-sm btn-outline-primary"><i class="fas fa-pencil"></i></button> <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button></td>
                      </tr>
                    @endforeach
                  </table>

                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModalToggle" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel"><strong>Perbarui Data</strong></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="category">Kategori</label>
              <select name="category" id="category" class="form-control">
                <option value="">-- Pilih Kategori --</option>
                @foreach($data as $key => $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="question">Pertanyaan</label>  
              <textarea name="question" id="question" rows="3" class="form-control"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="form-control btn btn-primary btn-block mb-4">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalCategory" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="modalCategoryLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCategoryLabel"><strong>Perbarui Data</strong></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label for="category">Kategori</label>
              <input name="category" id="category" class="form-control">
            </div>
            <div class="mb-3">
              <label for="options">Opsi</label>  
              <table class="table table-sm table-striped">
              </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="form-control btn btn-primary btn-block mb-4">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@stop
