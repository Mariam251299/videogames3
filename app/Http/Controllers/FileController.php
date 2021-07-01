<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();
        return view('files.file-index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('files.file-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file') && $request->file('file')->isValid()){
            //fuardar los archivos en la carpeta storage.app.documentos
            $ruta=$request->file->store('documentos');

            //Crear el registro en tabla file
            $file= new File();
            $file->ruta=$ruta;
            $file->nombre_original= $request->file->getClientOriginalName();
            $file->mime=$request->file->getMimeType();
            $file->save();

        }
        return redirect()->route('file.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function download(File $file)
    {
        return Storage::download($file->ruta, $file->nombre_original, ['Content-Type'=>$file->mime]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
