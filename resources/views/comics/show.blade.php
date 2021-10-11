@extends('layouts.main')

@section('title',$comic->title)

@section('content')
    <div class="card">
        <div class="card-body">
            <img src="{{$comic->thumb}}" class="card-img-top img-fluid w-25" alt="...">
            <h5 class="card-title">{{$comic->title}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$comic->type}}</h6>
            <p class="card-text">{{$comic->description}}</p>
        </div>
    </div>
@endsection