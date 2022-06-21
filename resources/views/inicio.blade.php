@extends('layouts.plantilla_inicio')

@section('titulo', 'Inicio')

@section('encabezado', 'Inicio')

@section('contenedor')
<a href="{{route('flamenco.index')}}">
   <div class="row centradouno">
        <div class="centrado col-md-12 fadeIn">
            <img src="{{asset('img/flamenco-espacio.png')}}" alt="" class="img-fluid">
        </div>
        
    </div>
    </div>
</a>  
    

@endsection

    
