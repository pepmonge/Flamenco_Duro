@extends('layouts.plantilla2')
{{-- <link rel="stylesheet" href="{{ asset('css/estilo.css') }}"/> --}}
@section('titulo', 'Editar Usuario')

@section('contenedor-central')

<div class="col-sm-12 col-xl-6">
    <form method="post" action="{{route('usuarios.update', $usuario)}}">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de cuenta</label>
            <select class="form-select" aria-label="Default select example">
                <option value="{{$usuario->tipo}}" selected>{{$usuario->tipo}}</option>
                <option value="Usuario">Usuario</option>
                <option value="Administrador">Administrador</option>
              </select>
        </div>          
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{$usuario->name}}">
            @error('password')
            <div class="alert alert-danger" role="alert">
                <small style="color: red">*{{$message}}</small>
            </div>
            @enderror 
        </div>          
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{$usuario->email}}">
            @error('password')
            <div class="alert alert-danger" role="alert">
                <small style="color: red">*{{$message}}</small>
            </div>
            @enderror 
        </div>          
        <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input type="password" class="form-control" name="password" value="{{$usuario->password}}">
            @error('password')
            <div class="alert alert-danger" role="alert">
                <small style="color: red">*{{$message}}</small>
            </div>
            @enderror 
        </div>          
        <div class="mb-3">
            <button type="submit" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
              </svg> Editar Cuenta</button>
        </div>                    
    </form>

    @if (Auth::user()->name != 'Pepe')
    {{-- Botón Modal --}}
    <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
      </svg> Eliminar Cuenta</button>
    @endif

      <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel">Eliminar Cuenta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        <h4>¿Realmente quiere eliminar su cuenta?</h4>
                        <p>La operación será irreversible</p>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancelar</button>

                <form action="{{route('usuarios.destroyPorUsuario', Auth::user()->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                </div>
            </div>
            </div>
        </div>

</div>

<div class="col-sm-12 col-xl-6 d-flex justify-content-center">
    <img src="{{asset('img/usuarios.png')}}" alt="" class="imgUsuario">
</div>









@endsection