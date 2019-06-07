@extends('layouts.app');
@section('content')
    <div class="row">
        
        <div class="col-md-12">
            <h2>Crear nuevo video</h2>   
            <hr>
            <div class="row">   
                      
            <form action="{{url('/save-video')}}" method="post" enctype="multipart/form-data" class="col-lg-7">
                {{csrf_field()}}
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                      <h4 class="alert-heading">Errores encontrados</h4>
                      <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                          @endforeach
                      </ul>
                      <p class="mb-0"></p>
                    </div>
                @endif        
                <div class="form-group">
                        <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea name="description" id="description" class="form-control" placeholder="" >{{old('description')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Minitatura</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="image">Seleccionar miniatura</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="video">Video</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="video" name="video" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="video">Seleccionar video</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success float-right">Guardar video</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection
