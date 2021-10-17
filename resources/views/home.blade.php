@extends('layouts.main')

@section('title','home')

@section('content')
    <div class="position-relative vh-100">
        <h1 class="m-2 text-center">HOMEPAGE</h1>
        <a href="{{route('comics.index')}}" class="btn btn-primary position-absolute top-50 start-50 translate-middle ">Clicca ed esplora i nostri fumetti</a>
    </div>
@endsection

    
