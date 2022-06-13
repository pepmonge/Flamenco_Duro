@extends('layouts.plantilla2')
{{-- <link rel="stylesheet" href="{{ asset('css/estilo.css') }}"/> --}}
@section('titulo', 'Contacto')


@section('contenedor-central')

<div class="row">
   <div class="col-sm-12 col-xl-6">
       <h1>Formulario de contacto</h1>
        <form action="{{route('contacto.store')}}" method="POST">
            @csrf        
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="formGroupExampleInput" placeholder="Nombre">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="formGroupExampleInput" placeholder="Email">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Asunto</label>
                    <textarea class="form-control" name="asunto" id="exampleFormControlTextarea1" rows="6"></textarea>
                </div>
                <button type="submit" class="btn btn-success mt-4"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
                  </svg> Enviar</button>             
        </form>

        @if (Session::has('mensaje'))
          <h3>{{Session::get('mensaje')}}</h3>
        @endif
   </div>

   <div class="col-sm-12 col-xl-6">
    <h1>Localización</h1>
    <div id="map-container-google-3" class="z-depth-1-half map-container-3 map-responsive">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25428.37580254373!2d-5.797342907613052!3d37.18723575112673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd127f0ec1c94487%3A0x6a1c6276d4cb02c0!2s41710%20Utrera%2C%20Sevilla!5e0!3m2!1ses!2ses!4v1652017474087!5m2!1ses!2ses" frameborder="0"
          style="border:0" allowfullscreen  width="100%" height="400px"></iframe>
      </div>
    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25428.37580254373!2d-5.797342907613052!3d37.18723575112673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd127f0ec1c94487%3A0x6a1c6276d4cb02c0!2s41710%20Utrera%2C%20Sevilla!5e0!3m2!1ses!2ses!4v1652017474087!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
    <button class="btn btn-success" type="button" onclick="cargarTabla()"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
      </svg> Informacion de Contacto</button>
    <div id="lista"></div>

    </div>  
</div>




@endsection
{{-- <script src="{{ asset('js/funcionesJavaScript.js') }}"></script> --}}
