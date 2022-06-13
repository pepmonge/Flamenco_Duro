@extends('layouts.plantilla2')
{{-- <link rel="stylesheet" href="{{ asset('css/estilo.css') }}"/> --}}
@section('titulo', 'Inicio')


@section('contenedor-central')
<div class="crear">
   <form class="row g-3" action="{{route('flamenco.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-12 col-xl-6">
        <label for="titulo" class="form-label">Titulo</label>        
        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo">
        @error('titulo')
            <small style="color: red">*{{$message}}</small><br>
        @enderror

        <label for="url" class="form-label mt-3">Url</label>
        <input type="text" class="form-control" name="url" id="url" placeholder="url">
        @error('url')
            <small style="color: red">*{{$message}}</small><br>
        @enderror

        <label for="imagen" class="form-label mt-3">Cargar imagen</label>
        <input class="form-control" type="file" name="imagen" id="imagen">
        @error('imagen')
            <small style="color: red">*{{$message}}</small><br>
        @enderror        
        {{-- @if (Session::has('mensaje'))
            <h3>{{Session::get('mensaje')}}</h3>
        @endif --}}
      </div>
    <div class="col-12 col-xl-6">
        <label for="contenido" class="form-label">Contenido</label>
  <textarea class="form-control" name="contenido" id="contenido" rows="10"></textarea>
    @error('contenido')
        <small style="color: red">*{{$message}}</small><br>
    @enderror
    <button type="submit" class="btn btn-success mt-4"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
      </svg> Crear</button>
      </div>
   </form>
</div>

   

  

@endsection





{{-- 
<table>
    <form action="{{route('flamenco.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <tr>
            <td><label for="titulo">Titulo</label></td>
            <td><input type="text" name="titulo" id="titulo"></td>
        </tr>
        <tr>
            <td><label for="contenido">Contenido</label></td>
            <td><textarea name="contenido" id="contenido" cols="50" rows="10"></textarea></td>
        </tr>
        <tr>
            <td><label for="imagen">Cargar imagen</label></td>
            <td><input type="file" name="imagen" id="imagen"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Enviar"></td>
        </tr>
    </form>
</table> --}}
    
