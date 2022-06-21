<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller {

    // Función para listar todoslos usuarios en caso de que el super-administrador haya iniciado sesión
    public function index(){
        $usuarios = User::all();
        if(Auth::user()->name == 'Pepe' && Auth::user()->id == 4){
            return view('usuarios.index', compact('usuarios'));
        }else{
            return redirect()->back()->with('mensaje', 'No tiene permisos para esa operación');
        }
    }

    // Función para seleccionar un usuario (Para luego actualizarlo)
    public function edit(User $usuario){        
        return view('usuarios.edit', compact('usuario'));        
    }

    // Función para actualizar los datos de los usuarios por el super-administrador
    public function update(Request $request, User $usuario){
        $request->validate([
            'password' => 'min:8'
        ]);

        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();
        return redirect()->route('flamenco.index')->with('mensj', 'Usuario actualizado con éxito');
    }

    //Funcion para que el superadministrador elimine cualquier cuenta
    public function destroy(User $usuario){
        if(Auth::user()->name == 'Pepe' && Auth::user()->id == 4){
            $usuario->delete();
            return redirect()->route('usuarios.index')->with('mensaje-exito', 'Usuario eliminado con exito');
        }
        
    }

    //Funcion para que un usuartio pueda eliminar su propia cuenta
    public function destroyPorUsuario(User $usuario){
        if(Auth::check()){
            $usuario->delete();
            return redirect()->route('flamenco.index')->with('mensj', 'Usuario eliminado con exito');
        }
        
    }
}
