@extends('layouts.main')

@section('title','comics')

@section('content')

    <div class="container">
      <form class="m-4 d-flex align-items-center justify-content-end">
            <input type="text" class="form-control me-2 w-25 " placeholder="Cerca un fumetto" name='search' value="{{$search}}">
            <button type="submit" class="btn-sm btn btn-primary">Submit</button>
      </form>
      @if (session('delete'))
      <div class="alert alert-success" role="alert">
        <h4>{{session('delete')}} Eliminata con successo</h4>
      </div>
      @endif
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

@section('script')
    <script>
        const deleteElement = document.getElementById("delete-comic");

        deleteElement.addEventListener('submit',function(event){
          event.preventDefault();
          const conf = window.confirm('Sei sicuro di voler eliminare il fumetto {{$comic->title}}');
          if(conf) this.submit();
        })
    </script>
@endsection
    

    
