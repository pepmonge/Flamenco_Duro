@extends('layouts.plantilla2')
@section('titulo', 'Articulo')

@section('contenedor-central')
   <input type="hidden" id="autor" value="{{$articulo->user_id}}">
   <input type="hidden" id="cont" value="{{$articulo->id}}">

   

   <div class="card">    
    <div class="card-body">
     <div class="row">
       <div class="col-12 col-md-8 embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item p-1" width="100%" height="400px" src="https://www.youtube.com/embed/{{$articulo->url}}" allowfullscreen></iframe>
        </div>
        <div class="col-12 col-md-4 d-none d-md-block" style="background-image: url({{ asset('img/cabpas.png') }}); background-repeat: no-repeat; background-position: center;">
          <h4>Artículos creados por usarios</h4>
          <select class="form-select bg-primary bg-opacity-10" multiple aria-label="multiple select example" id="ajax"></select>
          <div class="bg-success bg-opacity-10 mt-2 border border-1 rounded pb-5" id="ajaxDos"></div>         

          <button type="button" class="btn btn-success" onclick="cargarTodos()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-down" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z"/>
          </svg> Todos los usuarios</button>
        </div>
     </div>
        
       
    <h5 class="card-title">{{$articulo->titulo}}</h5>
    
    {{-- Mensaje de articulo creado y actualizado --}}
    @if (Session::has('mensaje'))                
    <div class="alert alert-success" role="alert">
      <h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </svg> {{Session::get('mensaje')}}</h4>
    </div>              
  </div> 
  @endif

  {{-- Mensaje de advertencia --}}
  @if (Session::has('mensajeFallido'))
   <div class="alert alert-danger" role="alert">
    <h4 ><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg> {{Session::get('mensajeFallido')}}</h4>
  </div>
@endif


  
  {{-- Div que muestra el contenido (el desarrollo del articulo) que provienen del Ajax --}}
  <div class="card-text" id="contenido"></div>

  {{-- Div que muestra los cmentarios que provienen del Ajax --}}
  <br><hr><h4>Comentarios</h4>
  <div class="mb-3" id="coment"></div>

  {{-- Formulario para crear los comentarios --}}
  <form action="{{route('comentarios.store')}}" method="post">
    @csrf
    <div class="mb-3" style="max-width: 30rem;">
      <label for="exampleFormControlTextarea1" class="form-label">Crear Comentario</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="comentario" rows="3"></textarea>
    </div>
    <input type="hidden" name="id" id="id" value="{{$articulo->id}}">
    <button type="submit" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
    </svg> Comentar</button>
  </form>    
  </div>
</div>


    
  <script src="{{ asset('ajax/funciones.js') }}"></script>
@endsection