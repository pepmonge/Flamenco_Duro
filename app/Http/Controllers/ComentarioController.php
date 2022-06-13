<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller {
    
    // Función para crear comentarios 
    public function store(Request $request){
        $comentario = new Comment();
        $comentario->article_id = $request->id;
        $comentario->user_id = Auth::user()->id;
        $comentario->comentario = $request->comentario; 
        $comentario->save();
        return redirect()->route('flamenco.show', $comentario->article_id );
    }

    // Función API para mostrar los comentarios en la parte inferior de los artículos
    public function apiComentarios(Request $request){
        $id = $request->id;
        $comment = Comment::select('comments.comentario', 'comments.created_at', 'users.name')->where('article_id', $id)->join('users', 'comments.user_id', '=', 'users.id')->get();
        return $comment;
    }

    
}
