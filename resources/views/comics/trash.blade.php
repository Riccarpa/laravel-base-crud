@extends('layouts.main')

@section('title','deleted')

@section('content')

    <div class="container">
      @if (session('deleted'))
      <div class="alert alert-success" role="alert">
        <h4>"{{session('deleted')}}" eliminata con successo</h4>
      </div>
      @endif
      <div class="d-flex flex-wrap justify-content-center">
          @foreach ($comics as $comic)
          <div class="card m-2 col-3" ">
              <img src="{{$comic->thumb}}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{$comic->title}}</h5>
                <p>{{$comic->price}}€</p>
                <div class="d-flex">
                  <a href="{{route('comics.show',$comic->id)}}" class="btn btn-primary me-1">Dettagli</a>
                  <form method="POST" action="{{route('comics.restore',$comic->id)}}" id="restore-comic">
                    @method('patch')
                    @csrf
                    <button type="submit" class="btn btn-success me-1 ">Ripristina</button>
                  </form>
                  <form method="POST" action="{{route('comics.forceDelete',$comic->id)}}" id="delete-comic">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina</button>
                  </form>
                </div>
              </div>
            </div>
          @endforeach
      </div>
    </div>
@endsection
