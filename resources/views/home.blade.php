@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>
                    {{ session('message') }}
                </strong> 
            </div>
        @endif

        <div class="col-md-12">
            <ul class="list-unstyled">
                @foreach ($videos as $keyVideo => $video)
                    <li class="media my-3">
                        <img src="{{url("/miniatura/$video->image")}}" class="img-thumbnail col-md-3 mr-3" alt="{{$video->title}}">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">
                                <a href="">
                                    {{$video->title}}
                                </a>                                                                
                            </h5>
                            <small>
                                {{$video->user->name}} {{$video->user->surname}} 
                            </small>
                            <p>
                                {{$video->description}}
                            </p>                            
                        </div>
                    </li>
                    
                @endforeach
            </ul>
            {{$videos->links()}}
        </div>
        
        <script>
          $(".alert").alert();
        </script>
    </div>
    
</div>
@endsection
