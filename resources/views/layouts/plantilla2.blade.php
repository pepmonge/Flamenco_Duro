<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- <link href="{{ asset('css/estilo.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}"/>
    <link rel="icon" type="image/jpg" href="{{ asset('/img/favicon.png') }}"/>
    
    
    <title>@yield('titulo')</title>
</head>
<body style="background-color: #e5e5e5">
  
{{-- cabecera --}}
 <div class="cabecera container p-4 bg-success rounded">
     <div class="row">
      <div class="col-sm-12 col-md-3 d-flex justify-content-center justify-content-md-start">
        <h1 class="text-light"><img src="{{ asset('/img/cab-250.png') }}" alt="" class="img-fluid"></h1>
     </div>
     <div class="col-sm-12 col-md-9 d-flex justify-content-center justify-content-md-end">
      <nav class="navbar navbar-expand-lg  navbar-light">
        <div class="container-fluid justify-content-md-end text-md-end justify-content-center text-center">
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">

              @if (Auth::check())
              @if (auth()->user()->name == 'Pepe' && auth()->user()->id == 4)
              <li class="nav-item">
                <a class="nav-link text-warning active" aria-current="page" href="{{route('usuarios.index')}}">Usuarios</a>
              </li>
              @endif
              @endif

              <li class="nav-item">
                <a class="nav-link text-light active" aria-current="page" href="{{route('flamenco.index')}}">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="{{route('flamenco.create')}}">Nuevo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="{{route('contacto.index')}}">Contacto</a>
              </li>

              {{-- Enlace modal --}}
              <li class="nav-item">

                <a class="nav-link text-light" data-bs-toggle="modal" data-bs-target="#exampleModal" href="">Ayuda</a>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ayuda de la aplicación</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <embed src="{{asset('ayuda/ayuda.htm')}}"
                               frameborder="0" width="100%" height="600px">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-bs-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                      </svg> Cerrar</button>
                    </div>
                  </div>
                </div>
                </div>
                
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
 </div>

 {{-- cabecera --}}




 {{-- usuario logeado o no --}}
 <div class="container">
  <div class="row">
    <div class="col-12 d-flex justify-content-center justify-content-md-end">
      @if (Auth::check())  

          {{-- Botón desplegable --}}
          <a class="nav-link d-inline dropdown-toggle dropdown" id="desplegable" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->name }} 
          </a>
          <div class="dropdown-menu p-2" aria-labelledby="desplegable">
            <a class="nav-link d-inline" href="{{ route('usuarios.edit', auth()->user()->id) }}">Configurar</a>
            <hr class="dropdown-divider">
            <a class="nav-link d-inline" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>   
          </div>
         
                   
            <!--Si el usuario no esta logeado se quita su nombre y aparece un botos de login y otro para registrarse-->      
      @else    
          <a class="nav-link d-inline" href="{{ route('login') }}">Login</a>
          <a class="nav-link d-inline" href="{{ route('register') }}">Registrate</a>        
     @endif
     </div>
  </div>
 </div>
  {{-- usuario logeado o no --}}


  {{-- CONTENEDOR CENTRAL --}}
<div class="container contenedor">
  <div class="contenedor-central row">
    @yield('contenedor-central')




    {{-- <script src="{{ asset('ajax/funciones.js') }}"></script> --}}
    {{-- <script src="{{asset('dist/umd/popper.min.js')}}" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> --}}
    <script src="{{asset('dist/js/bootstrap.min.js')}}" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   
    <script src="{{asset('dist/js/bootstrap.bundle.js')}}" crossorigin="anonymous"></script>   

    </div>
</div>
 {{-- CONTENEDOR CENTRAL --}}

{{-- pie --}}
<div class="container pie">
  <div class="row bg-secondary mt-4 rounded">

    <div class="col-12 col-xl-4 text-center text-light">
      <img src="{{asset('img/logo-blanco.png')}}" alt="" class="img-fluid">
      <p><small>Creaciones Oripandó © 2022 Reservados todos los derechos</small></p>
    </div>

    <div class="col-sm-12 col-xl-4 text-light text-center d-flex justify-content-center justify-content-xl-end">
      <div id="contact" class="ps-0 ps-xl-5"></div>
    </div>

    {{-- Politicas e iconos --}}
    <div class="col-sm-12 col-xl-4 d-flex justify-content-center justify-content-xl-end">
      <div class="text-light text-center mt-3 w-0 w-xl-50 me-0 me-xl-4" id="iconos">

        {{-- Iconos --}}
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
          <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
          <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
          <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
        </svg>

        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
          <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
        </svg>
        
        {{-- Politicas --}}
        <p class="ms-1">
        <a href="{{asset('politicas/politica_de_privacidad.pdf')}}" target="back" style=" color: #ffffff; text-decoration: none;"><small>Politica de privacidad</small></a><br>
        <a href="{{asset('politicas/aviso_legal.pdf')}}" target="back" style=" color: #ffffff; text-decoration: none;"><small>Aviso legal</small></a><br>
        <a href="{{asset('politicas/politica-cookies.pdf')}}" target="back" style=" color: #ffffff; text-decoration: none;"><small>Política de cookies</small></a></p>
      </div>
    </div>   
  </div>
</div>
{{-- pie --}}

<script src="{{ asset('js/funcionesJavaScript.js') }}"></script>
</body>
</html>