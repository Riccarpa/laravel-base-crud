@extends('layouts.main')
@section('title','New Comic')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('comics.store')}}" class="row g-3">
            @csrf
            <div class="col-md-6">
              <label for="title" class="form-label">Titolo</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="col-md-6">
              <label for="series" class="form-label">Serie</label>
              <input type="text" class="form-control" id="series" name="series">
            </div>
            <div class="col-12">
              <label for="description" class="form-label">Descrizione</label>
              <textarea name="description" id="description" cols="30" placeholder="Descrizione..." rows="10" class="w-100 form-control"></textarea>
            </div>
            <div class="col-12">
              <label for="thumb" class="form-label">Link assoluto immagine</label>
              <input type="text" class="form-control" id="thumb" name="thumb">
            </div>
            <div class="col-md-4">
              <label for="type"  class="form-label">Tipo fumetto</label>
              <input type="text" class="form-control" id="type" name="type">
            </div>
            <div class="col-md-4">
              <label for="release_date" class="form-label">Data di uscita</label>
              <input type="date" class="form-control" name="sale_date" id="release_date">
            </div>
            <div class="col-md-4">
                <label for="price"  class="form-label">Prezzo</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <div class="col-md-12 d-flex justify-content-end"><button type="submit" class="btn  btn-primary">Crea</button></div>

          </form>
    </div>
@endsection
    