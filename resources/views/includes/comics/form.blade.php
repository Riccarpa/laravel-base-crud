<div class="container text-light">


    @if($comic->exists)
    <form method="POST" action="{{route('comics.update',$comic->id)}}" class="row g-3">
    @method('PATCH')
    
    @else
    <form method="POST" action="{{route('comics.store',$comic->id)}}" class="row g-3">
    @endif
        @csrf
        <div class="col-md-6">
          <label for="title" class="form-label">Titolo</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror " id="title" name="title" value="{{ old('title', $comic->title)}}">
          @error('title')
             <div class="invalid-feedback">
                {{$message}}   
            </div> 
          @enderror
        </div>
        <div class="col-md-6">
          <label for="series" class="form-label">Serie</label>
          <input type="text" class="form-control  @error('series') is-invalid @enderror" id="series" name="series" value="{{old('series',$comic->series)}}">
          @error('series')
             <div class="invalid-feedback">
                {{$message}}   
            </div> 
          @enderror
        </div>
        <div class="col-12">
          <label for="description" class="form-label">Descrizione</label>
          <textarea name="description" id="description" cols="30" placeholder="Descrizione..." rows="10" class="w-100 form-control  @error('description') is-invalid @enderror">{{old('description',$comic->description) }}</textarea>
          @error('description')
             <div class="invalid-feedback">
                {{$message}}   
            </div> 
          @enderror
        </div>
        <div class="col-12">
          <label for="thumb" class="form-label">Link assoluto immagine</label>
          <input type="text" class="form-control  @error('thumb') is-invalid @enderror" id="thumb" name="thumb" value="{{old('thumb',$comic->thumb)}}">
          @error('thumb')
             <div class="invalid-feedback">
                {{$message}}   
            </div> 
          @enderror
        </div>
        <div class="col-md-4">
          <label for="type"  class="form-label">Tipo fumetto</label>
          <input type="text" class="form-control  @error('type') is-invalid @enderror" id="type" name="type" value="{{old('type',$comic->type)}}">
          @error('type')
             <div class="invalid-feedback">
                {{$message}}   
            </div> 
          @enderror
        </div>
        <div class="col-md-4">
          <label for="release_date" class="form-label">Data di uscita</label>
          <input type="date" class="form-control  @error('sales_date') is-invalid @enderror" name="sale_date" id="release_date" value="{{old('sales_date',$comic->sale_date)}}">
          @error('sale_date')
             <div class="invalid-feedback">
                {{$message}}   
            </div> 
          @enderror
        </div>
        <div class="col-md-4">
            <label for="price"  class="form-label">Prezzo</label>
            <input type="text" class="form-control  @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price',$comic->price)}}">
            @error('price')
             <div class="invalid-feedback">
                {{$message}}   
            </div> 
          @enderror
          </div>

        <div class="col-md-12 d-flex justify-content-end"><button type="submit" class="btn  btn-primary">{{request()->routeIs('comics.edit',$comic->id) ?'Modifica':'Crea'}}</button></div>

      </form>
</div>