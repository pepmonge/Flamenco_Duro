<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticuloController extends Controller {
   
    // Función para listar todos los articulosº
    public function index(Request $request){
        $texto = trim($request->get('texto'));
        $articulo = Article::select('articles.id', 'articles.titulo', 'articles.contenido', 'articles.imagen', 'articles.url', 'articles.created_at', 'users.name as autor')
            ->join('users', 'users.id', '=', 'articles.user_id')
            ->where('articles.titulo', 'LIKE', '%'.$texto.'%')
            ->orWhere('articles.contenido', 'LIKE', '%'.$texto.'%')
            ->orderBy('articles.created_at', 'desc')
            ->paginate(5);

       if(count($articulo) == 0){
            return back()->with('mensaje', 'La busqueda no produjo resultados');
        }else{
            return view('flamenco.index', compact('articulo'));
        }        
    }

    // Función para mostrar un articulo en concreto
    public function show(Article $articulo){
        $coment = Comment::select('comments.comentario', 'users.name as autor')
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->where('comments.article_id', '=', $articulo->id)->get();
        return view('flamenco.show', compact('articulo', 'coment'));
    }

    // Función que conduce al formulario de creacion de nuevo articulo
    public function create(){
        if (Auth::user()->tipo == 'Administrador'){
            return view('flamenco.create');
        }else {
            return redirect()->route('flamenco.index')->with('mensaje', 'Solo los administradores pueden crear artículos');
        }
    }
   
    // Función crear un nuevo articulo
    public function store(Request $request){
        $request->validate([
            'titulo' => 'required',
            'url' => 'required',
            'imagen' => 'required',
            'contenido' => 'required'
        ]);

        $art = new Article();

        //Condición para la subida de imagen y obtencion del nombre de la imagen
        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $destino = 'img/';
            $nombreImagen = $imagen->getClientOriginalName();
            $subida = $request->file('imagen')->move($destino, $nombreImagen);
            $art->imagen = $destino . $nombreImagen;
        }

        $art->user_id = Auth::user()->id;
        $art->titulo = $request->titulo;
        $art->contenido = nl2br($request->contenido);       
        
        $art->url = separaIdVideo($request->url);      

        $art->save();

        return redirect()->route('flamenco.show', $art->id)->with('mensaje', 'Articulo creado con exito');
    }

     // Función que conduce al formulario de actualización de un articulo
    public function edit(Article $articulo){        
        if (Auth::user()->tipo == 'Administrador'){
            if ($articulo->user_id == Auth::user()->id){
                return view('flamenco.edit', compact('articulo'));
            }else{
                return redirect()->back()->with('mensaje', 'El articulo solo puede ser actualizado por el autor');
            }
        }else {
            return redirect()->route('flamenco.index')->with('mensaje', 'No tiene permisos para realizar esta operación');
        }       
         
    }

    // Función para actualizar un articulo ya creado
    public function update(Request $request, Article $articulo){
        if ($request->hasFile('imagen')){  //Si el formulario viene con imagen...
            $imagen = $request->file('imagen');
            $destino = 'img/';
            $nombreImagen = $imagen->getClientOriginalName();
            $request->file('imagen')->move($destino, $nombreImagen);
            $articulo->imagen = $destino . $nombreImagen;
        }

        $articulo->titulo = $request->titulo;
        $articulo->contenido = nl2br($request->contenido);
        $articulo->contenido = unSoloSalto($articulo->contenido);
             
        $band = false;

        $arrayCaracter = str_split($request->url);
        
        for ($i=0; $i < count($arrayCaracter); $i++) { 
            if ($arrayCaracter[$i] == '='){
                $band = true;
            }
        }

        if ($band == true){
            $articulo->url = separaIdVideo($request->url);
        }    
                
        $articulo->created_at = $articulo->updated_at;

        $articulo->save();
        return redirect()->route('flamenco.show', $articulo->id)->with('mensaje', 'Articulo actualizado satisfactoriamente');
    }


     // Función para eliminar un articulo
    public function destroy(Article $articulo){
        if ($articulo->user_id == Auth::user()->id){
            $articulo->delete();
            return redirect()->route('flamenco.index');
        }else{
            return redirect()->back()->with('mensaje', 'El articulo solo puede ser eliminado por el autor');
        }
        
    }

    //Funcion api que selecciona un articulo por id del usuario
    public function apiArticulos($userId){
        $articulo = Article::select('articles.id', 'articles.titulo', 'articles.contenido', 'articles.imagen', 'articles.url', 'articles.created_at', 'users.name')->where('user_id', $userId)->join('users', 'articles.user_id', '=', 'users.id')->get();
        return $articulo;
    }
    
    //Funcion api que selecciona un articulo por id de articulo
    public function apiComentarioArticulo($id){
        $articulo = Article::select('articles.titulo', 'articles.contenido')->where('articles.id', $id)->get();
        return $articulo;
    }

    



}
