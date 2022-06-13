<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>@yield('titulo')</title>
</head>
<body style="background-color: black">

<div class="container">
 {{-- <div class="row">
     <div class="col-md-6 bg-success p-3 rounded">
        <h1 class="text-light">@yield('encabezado')</h1>
     </div>
     <div class="col-md-6 bg-success p-3 rounded">
        <ul class="nav justify-content-end pt-2">
            <li class="nav-item">
              <a class="nav-link text-light active" aria-current="page" href="{{route('flamenco.index')}}">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="{{route('flamenco.create')}}">Nuevo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light disabled">Disabled</a>
            </li>
          </ul>
     </div>
 </div> --}}
 @yield('contenedor')

</div><!--Contenedor-->

<script src="{{asset('dist/umd/popper.min.js')}}" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="{{asset('dist/js/bootstrap.min.js')}}" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   
</body>
</html>