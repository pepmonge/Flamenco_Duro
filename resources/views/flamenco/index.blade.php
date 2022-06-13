@extends('layouts.plantilla2')
{{-- <link rel="stylesheet" href="{{ asset('css/estilo.css') }}"/> --}}
@section('titulo', 'Inicio')


@section('contenedor-central')
   {{-- @section('encabezado', 'Inicio Flamenco') --}}

{{-- Mensaje de no se puede --}}
@if (Session::has('mensaje'))
   <div class="alert alert-danger" role="alert">
    <h4 ><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg> {{Session::get('mensaje')}}</h4>
  </div>
@endif

{{-- Mensaje de éxito --}}
@if (Session::has('mensj'))
   <div class="alert alert-success" role="alert">
    <h4 ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </svg> {{Session::get('mensj')}}</h4>
  </div>
@endif

  @if (count($articulo) == 1)
   <div class="container" style="height: 65vh;">
  @endif
  
  @if (count($articulo) > 1)
   <div class="container">
  @endif
   @foreach ($articulo as $art)
   
   {{-- card de la lista de articulos --}}
   <div class="card mb-3" style="background-color: #d5d5d6">
      <div class="row g-0">
        <div class="col-md-3"><a href="{{route('flamenco.show', $art)}}" style="background-color: #d5d5d6">
          <img src="{{$art->imagen}}" class="img-fluid rounded-start" alt="..." width="100%">
        </a></div>
        <div class="col-md-6 col-xl-7">
          <div class="card-body">
            <a href="{{route('flamenco.show', $art)}}" style="text-decoration: none;"><h5 class="card-title">{{$art->titulo}}</h5></a>
            <p class="card-text">{{$value = Str::limit($art->contenido, 55)}}</p>
            <p class="card-text">Autor: {{$art->autor}}</p>
            <p class="card-text"><small class="text-muted">Creado: {{date("d-m-Y",strtotime($art->created_at))}}</small></p>
          </div>
        </div>

        @if (!Auth::check())
          <div class="col-md-2 botonera">
        @endif

          @if (Auth::check())

          <div class="col-12 col-md-3 col-xl-2 botonera">

            @if (auth()->user()->tipo == 'Administrador')

                <form action="{{route('flamenco.destroy', $art->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger boton" ><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                  </svg> Borrar</button>
                </form>
                <form class="mt-3" action="{{route('flamenco.edit', $art)}}" method="get">
                  @csrf
                  <button type="submit" class="btn btn-warning boton"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                    <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                    <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                  </svg> Actualizar</button>
              </form>       
                   
            @endif
          @endif
          
        </div>
      </div>
    </div>
       
   @endforeach

  {{$articulo->links()}}

  </div>
  
@endsection


