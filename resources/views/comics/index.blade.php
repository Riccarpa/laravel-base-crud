@extends('layouts.main')

@section('title','comics')

@section('content')
    <div class="container d-flex">
        @foreach ($comics as $comic)
        <div class="card m-2" style="width: 18rem;">
            <img src="{{$comic->thumb}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$comic->title}}</h5>
              <p>{{$comic->price}}€</p>
              <a href="{{route('comics.show',$comic->id)}}" class="btn btn-primary">Dettagli</a>
            </div>
          </div>
        @endforeach
    </div>
@endsection
    
