<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- <link href="{{ asset('css/estilo.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}"/>
    
    
    <title>@yield('titulo')</title>
</head>
<body style="background-color: #e5e5e5">
  
<div class="container">
 <div class="row bg-success p-2 rounded">
     <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-start">
        <img src="{{ asset('/img/cab-band-450.png') }}" alt="" class="img-fluid">
     </div>
     <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link text-light active" aria-current="page" href="{{route('flamenco.index')}}">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="{{route('flamenco.create')}}">Nuevo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="{{route('contacto.index')}}">Contacto</a>
              </li>
            </ul>
            <form class="d-flex" action="{{route('flamenco.index')}}" method="get">
              @csrf
              <input class="form-control me-2" type="search" name="texto" value="" placeholder="Buscar" aria-label="Search">
              <button class="btn btn-outline-success text-light border border-warning" type="submit">Buscar</button>
            </form>
          </div>
        </div>
      </nav>
        
     </div>
 </div>

 <div class="row">
   <div class="col-12 d-flex justify-content-center justify-content-md-end">
    @if (Auth::check())            
        <p class="nav-link d-inline">{{ auth()->user()->name }} </p>
        <a class="nav-link d-inline" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>            
          <!--Si el usuario no esta logeado se quita su nombre y aparece un botos de login y otro para registrarse-->      
    @else    
        <a class="nav-link d-inline" href="{{ route('login') }}">Login</a>
        <a class="nav-link d-inline" href="{{ route('register') }}">Registrate</a>        
   @endif
   </div>
 </div>



 @yield('contenedor')

 <div class="row bg-success mt-4 rounded" id="pie" style="margin-bottom: 0">
   <div class="col-12 ">
   <p class="text-center text-light pt-3">Creaciones Oripandó - ©Copyright 2022</p>
 </div>


</div><!--Contenedor-->
{{-- <script src="{{ asset('ajax/funciones.js') }}"></script> --}}
{{-- <script src="{{asset('dist/umd/popper.min.js')}}" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> --}}
<script src="{{asset('dist/js/bootstrap.min.js')}}" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   
</body>
</html>