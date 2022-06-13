@extends('layouts.plantilla_inicio')

@section('titulo', 'Inicio')

@section('encabezado', 'Inicio')

@section('contenedor')
<a href="{{route('flamenco.index')}}">
    <div class="row">
        <div class="col-md-12 bg-black d-flex justify-content-center p-5">
            <img src="{{asset('img/cab.png')}}" alt="" class="img-fluid">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 bg-black d-flex justify-content-center p-5">            
            <video autoplay="autoplay" loop="loop" muted defaultMuted playsinline  oncontextmenu="return false;"  preload="auto"  id="miVideo">
                <source src="{{asset('img/video.mp4')}}" type="video/mp4">
            </video>
        </div>
    </div>
</a>  
    <div class="row">
        <div class="col-md-12 bg-black d-flex justify-content-center p-5">
            <p class="text-light text-center">El proposito de esta web es acercar al publico este arte asi como a los artistas en sus facetas tecnica y liricas.</p>
        </div>
    </div>
 

@endsection

    
