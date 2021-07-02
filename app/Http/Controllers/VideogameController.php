<?php

namespace App\Http\Controllers;

use App\Models\Videogame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate; //gate
use Illuminate\Validation\Rule;

class VideogameController extends Controller
{
    public function __construct(){
        // el middleware('auth') permite que solo el que este loggeado pueda acceder a esa ruta
        // $this->middleware('auth')->except('show');
        $this->middleware('auth');
        //mapea todos los metodos del controlador con todos los metodos del policy, por lo que ya no hay que escribirlos en el controlador
        $this->authorizeResource(Videogame::class, 'videogame');
        $this->rules=[
            'nombre' => 'required|string|max:100',
            'categoria' => 'required|string|max:100',
            'plataforma' => 'required|string|max:50',
            'precio' => ['required','regex:/^\d+(\.\d{1,2})?$/'],
            'portada' => 'required|url',
            'descripcion' =>'required|string|max:1000|min:5',
        ];

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tabla con todos los videojuegos
        // $videogames = Videogame::get(); //consulta a la tabla en la base de datos
        //esta linea nos da los videogames del usuario en el que estamos solamente (auth)
        // $videogames = Auth::user()->videogames()->get();
        if(Auth::user())
            if(Auth::user()->tipo=='Administrador')
                $videogames = Auth::user()->videogames()->with('user:id,name')->get();
            else
                $videogames=Videogame::with('user:id,name')->get();

        return view('videogame.videogame-index', compact('videogames'));//el primer parametro es la vista (ubicada en resources/views). El segundo es la tabla de videogames de la db
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   //$this->authorize('create');
        //gates
        //Gate::authorize('admin-videogames');
        return view('videogame.videogame-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //base de datos
        //Gate::authorize('admin-videogames'); //gates
        //$this->authorize('create'); //policy
        //validacion de formularios del lado del servidor
        $request ->validate($this->rules);
        //merge nos permite agregar campos al request como si los hubiera recibido por parametros tambien
        $request->merge(['user_id' => Auth::id()]);
        //La siguiente linea nos permite guardar todos los datos del formulario en la base de datos
        Videogame::create($request->all());
        //cuando nos guarde en la db, nos redirecciona al index
        return redirect()->route('videogame.index')->with('info','Videojuego agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Videogame  $videogame
     * @return \Illuminate\Http\Response
     */
    public function show(Videogame $videogame)
    {
        //muestra un videojuego en especifico de acuerdo a su id
        return view('videogame.videogame-show', compact('videogame'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Videogame  $videogame
     * @return \Illuminate\Http\Response
     */
    public function edit(Videogame $videogame)
    {
        //$this->authorize('update', $videogame); //policy

        //Gate::authorize('admin-videogames');
        return view ('videogame.videogame-form', compact('videogame'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Videogame  $videogame
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Videogame $videogame)
    {
        // Gate::authorize('admin-videogames'); //gates
        //$this->authorize('update', $videogame); //policy
        //actualiza las modificaciones
        $request ->validate($this->rules);
        //a la linea de abajo le pasamos todo lo que trae request, que son los nuevos valores de cada campo de la tabla videojuegos (acabados de actualizar por el usuario). Debemos especificarle donde debe ser la actualizacion porque, si no lo hacemos, actualizacia toda la tabla. Except se pone para evitar errores, ya que el token y el method patch son confundidos pro columnas, por lo que debemos excluirlos al hacer la actualizacion
        Videogame::where('id', $videogame->id)->update($request->except('_token', '_method'));

        return redirect()->route('videogame.show', $videogame);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Videogame  $videogame
     * @return \Illuminate\Http\Response
     */
    public function destroy(Videogame $videogame)
    {
        //Gate::authorize('admin-videogames'); //gate
        //$this->authorize('delete', $videogame); //policy
        //elimina un videojuego
        $videogame->delete();
        return redirect()->route('videogame.index')->with('delete','Videojuego eliminado exitosamente.');
    }
}
