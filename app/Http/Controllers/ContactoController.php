<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    // Función que conduce la pagina de contacto
    public function index(){
        return view('contacto.index');
    }

    // Función que crea un correo y lo envia al correo del super-administrador
    public function store(Request $request){
        $correo = new ContactoMailable($request->all());
        Mail::to('felipondio1974@gmail.com')->send($correo);
        return redirect()->back()->with('mensaje', 'Mensaje enviado con exito');
    }
}
