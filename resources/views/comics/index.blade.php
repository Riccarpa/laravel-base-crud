@extends('layouts.main')

@section('title','comics')

@section('content')
  @if (count($comics)>0)
    <div class="container">
      <form class="m-4 d-flex align-items-center justify-content-end">
            <input type="text" class="form-control me-2 w-25 " placeholder="Cerca un fumetto" name='search' value="{{$search}}">
            <button type="submit" class="btn-sm btn btn-primary">Submit</button>
      </form>
      <div class="text-start mb-4 "><a href="{{route('trash.index')}}">Cestino</a></div>
      @if (session('delete'))
      <div class="alert alert-success" role="alert">
        <h4>"{{session('delete')}}" eliminata con successo</h4>
      </div>
      @endif
      @if (session('restore'))
      <div class="alert alert-success" role="alert">
        <h4>"{{session('restore')}}" ripristinata con successo</h4>
      </div>
      @endif
      <div class="d-flex  flex-wrap">
          <div class="row g-4">
            @foreach ($comics as $comic)
            <div class="card col-3 bg-dark">
                <a href="{{route('comics.show',$comic->id)}}"><img src="{{$comic->thumb}}" class="card-img-top" alt="..."></a>
                <div class="card-body text-light">
                  <h5 class="card-title">{{$comic->title}}</h5>
                  <p class="text-center">{{$comic->price}}€</p>
                  <div id="buttons" class="d-flex justify-content-center">
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
        
        @else
          <div>
            <h5 class="m-4 text-center">Nessun fumetto trovato con il nome "{{$search}}"</h5>
          </div>
      
      @endif
    </div>
  @endsection
  

@section('script')
    <script>
        const deleteElement = document.getElementById("delete-comic");
        
        deleteElement.addEventListener('submit',function(event){
          event.preventDefault();
          const conf = window.confirm('Sei sicuro di voler eliminare il fumetto');
          if(conf) this.submit();
        })
    </script>
@endsection
    

    
