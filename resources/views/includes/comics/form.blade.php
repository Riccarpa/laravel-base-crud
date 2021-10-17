<div class="container text-light">


    @if($comic->exists)
    <form method="POST" action="{{route('comics.update',$comic->id)}}" class="row g-3">
    @method('PATCH')
    
    @else
    <form method="POST" action="{{route('comics.store',$comic->id)}}" class="row g-3">
    @endif

      
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


        @csrf
        <div class="col-md-6">
          <label for="title" class="form-label">Titolo</label>
          <input type="text" class="form-control" id="title" name="title" value="{{$comic->title}}">
        </div>
        <div class="col-md-6">
          <label for="series" class="form-label">Serie</label>
          <input type="text" class="form-control" id="series" name="series" value="{{$comic->series}}">
        </div>
        <div class="col-12">
          <label for="description" class="form-label">Descrizione</label>
          <textarea name="description" id="description" cols="30" placeholder="Descrizione..." rows="10" class="w-100 form-control">{{$comic->description }}</textarea>
        </div>
        <div class="col-12">
          <label for="thumb" class="form-label">Link assoluto immagine</label>
          <input type="text" class="form-control" id="thumb" name="thumb" value="{{$comic->thumb}}">
        </div>
        <div class="col-md-4">
          <label for="type"  class="form-label">Tipo fumetto</label>
          <input type="text" class="form-control" id="type" name="type" value="{{$comic->type}}">
        </div>
        <div class="col-md-4">
          <label for="release_date" class="form-label">Data di uscita</label>
          <input type="date" class="form-control" name="sale_date" id="release_date" value="{{$comic->sale_date}}">
        </div>
        <div class="col-md-4">
            <label for="price"  class="form-label">Prezzo</label>
            <input type="text" class="form-control" id="price" name="price" value="{{$comic->price}}">
        </div>

        <div class="col-md-12 d-flex justify-content-end"><button type="submit" class="btn  btn-primary">{{request()->routeIs('comics.edit',$comic->id) ?'Modifica':'Crea'}}</button></div>

      </form>
</div>