@extends('layouts.main')

@section('title',$comic->title)

@section('content')
    <div class="card text-center">
        <div class="card-body d-flex align-items-center flex-column">
            <h2 class="card-title">{{$comic->title}}</h2>
            <figure class="w-50 h-50"><img src="{{$comic->thumb}}" class="card-img-top img-fluid w-25" alt="..."></figure>
            <h4 class="card-subtitle mb-2 text-muted text-capitalize ">{{$comic->type}}</h4>
            <p class="card-text w-75">{{$comic->description}}</p>
            <div class="d-flex">
                <a href="{{route('comics.index',$comic->id)}}" class="btn btn-primary me-1">Indietro</a>
                <a href="{{route('comics.edit',$comic->id)}}" class="btn btn-warning me-1">Modifica</a>
            </div>
        </div>
    </div>
@endsection