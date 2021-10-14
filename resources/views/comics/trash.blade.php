@extends('layouts.main')

@section('title','deleted')

@section('content')

    <div class="container">
     
      <div class="d-flex">
          @foreach ($comics as $comic)
          <div class="card m-2" style="width: 18rem;">
              <img src="{{$comic->thumb}}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{$comic->title}}</h5>
                <p>{{$comic->price}}€</p>
                <div class="d-flex">
                  <a href="{{route('comics.show',$comic->id)}}" class="btn btn-primary me-1">Dettagli</a>
                  <a href="{{route('comics.edit',$comic->id)}}" class="btn btn-warning me-1">Modifica</a>
                  <form method="POST" action="{{route('comics.destroy',$comic->id)}}" id="delete-comic">
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
