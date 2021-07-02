<?php

namespace App\Http\Controllers;

use App\Models\Ftpvideogame;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate; //gate
use Illuminate\Validation\Rule;

class FtpvideogameController extends Controller
{
    public function __construct(){
        // el middleware('auth') permite que solo el que este loggeado pueda acceder a esa ruta
        // $this->middleware('auth')->except('show');
        $this->middleware('auth');
        $this->rules=[
            'nombre' => 'required|string|max:100',
            'categoria' => 'required|string|max:100',
            'descripcion' =>'required|string|max:1000|min:5',
            'juego' => 'required|url',
        ];

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if(Auth::user())
        //     if(Auth::user()->tipo=='Administrador')
        //         //esta linea nos da los ftpvideogames del usuario en el que estamos solamente (eager loading)
        //         $ftpvideogames = Auth::user()->ftpvideogames()->with('user:id,name')->get();
        //     else
        //         $ftpvideogames=Ftpvideogame::with('user:id,name')->get();
        $ftpvideogames=Ftpvideogame::get();

        return view('ftpvideogame.ftpvideogame-index', compact('ftpvideogames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //gates
        Gate::authorize('admin-ftpvideogames');
        return view('ftpvideogame.ftpvideogame-form');
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
        //gates
        Gate::authorize('admin-ftpvideogames');
        //validacion de formularios del lado del servidor
        $request ->validate($this->rules);
        //merge nos permite agregar campos al request como si los hubiera recibido por parametros tambien
        //  $request->merge(['user_id' => Auth::id()]);
        //La siguiente linea nos permite guardar todos los datos del formulario en la base de datos
        Ftpvideogame::create($request->all());
        //cuando nos guarde en la db, nos redirecciona al index
        return redirect()->route('ftpvideogame.index')->with('info','FTPVideojuego agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ftpvideogame  $ftpvideogame
     * @return \Illuminate\Http\Response
     */
    public function show(Ftpvideogame $ftpvideogame)
    {
        $users = User::get();
        //muestra un videojuego en especifico de acuerdo a su id
        return view('ftpvideogame.ftpvideogame-show', compact('ftpvideogame', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ftpvideogame  $ftpvideogame
     * @return \Illuminate\Http\Response
     */
    public function edit(Ftpvideogame $ftpvideogame)
    {
        //gates
        Gate::authorize('admin-ftpvideogames');
        return view ('ftpvideogame.ftpvideogame-form', compact('ftpvideogame'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ftpvideogame  $ftpvideogame
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ftpvideogame $ftpvideogame)
    {
        //gates
        Gate::authorize('admin-ftpvideogames');
        //actualiza las modificaciones
        $request ->validate($this->rules);
        //a la linea de abajo le pasamos todo lo que trae request, que son los nuevos valores de cada campo de la tabla videojuegos (acabados de actualizar por el usuario). Debemos especificarle donde debe ser la actualizacion porque, si no lo hacemos, actualizacia toda la tabla. Except se pone para evitar errores, ya que el token y el method patch son confundidos pro columnas, por lo que debemos excluirlos al hacer la actualizacion
        Ftpvideogame::where('id', $ftpvideogame->id)->update($request->except('_token', '_method'));

        return redirect()->route('ftpvideogame.show', $ftpvideogame);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ftpvideogame  $ftpvideogame
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ftpvideogame $ftpvideogame)
    {
        //gates
        Gate::authorize('admin-ftpvideogames');
        //elimina un videojuego
        $ftpvideogame->delete();
        return redirect()->route('ftpvideogame.index')->with('delete','FTPVideojuego eliminado exitosamente.');
    }


        /**
     * Agrega un usuario a un ftpvideogame.
     *
     * @param  \App\Models\Ftpvideogame  $ftpvideogame
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function agregaUsuario(Request $request, Ftpvideogame $ftpvideogame)
    {
        //gates
        Gate::authorize('admin-ftpvideogames');
        $ftpvideogame->users()->sync($request->user_id);
        return redirect()->route('ftpvideogame.show', $ftpvideogame);
    }
}
