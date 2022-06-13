@extends('layouts.plantilla2')
@section('titulo', 'Inicio')

@section('contenedor-central')

    {{-- Formulario para actualizar los artículos --}}
    <div style="height: 60vh;">
        <form class="row g-3" action="{{route('flamenco.update', $articulo)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="col-6">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" value="{{$articulo->titulo}}" name="titulo" id="titulo" placeholder="Titulo">
                <label for="url" class="form-label">Url</label>
                <input type="text" class="form-control" value="https://www.youtube.com/embed/{{$articulo->url}}" name="url" id="url" placeholder="Titulo">
                <label for="imagen" class="form-label mt-3">Cargar imagen</label>
                <input class="form-control" type="file" value="{{$articulo->imagen}}" name="imagen" id="imagen">
                <button type="submit" class="btn btn-success mt-4"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                    <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                    <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                </svg> Actualizar</button>
                @if (Session::has('mensaje'))
                    <h3>{{Session::get('mensaje')}}</h3>
                @endif
            </div>
            <div class="col-6">
                <label for="contenido" class="form-label">Contenido</label>
                <textarea class="form-control" name="contenido" id="contenido" rows="10">{{$articulo->contenido}}</textarea>
            </div>
       </form>
    </div>
    
@endsection