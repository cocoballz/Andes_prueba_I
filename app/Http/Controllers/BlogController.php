<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BlogModel;

class BlogController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $datos= BlogModel::select('*')->with('usuario')->get();
        return view('list_entradas',compact('datos'));
    }

    /**
    * Display a Api listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function list_api()
    {
        $datos= BlogModel::select('*')->where('estado',1)->with('usuario')->get();
        return $datos;
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $title= "Crear";
        $datos= new BlogModel;
        $opc = 0;
        return view('form',compact('datos','title','opc'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store()
    {

        if(request('opc') == 0 ){
            request()->validate([
                'entr_title' => 'required|min:3',
                'descripcion' => 'required|min:3',
                'opc' => 'required',
                'File01' => 'required|file|mimes:jpg,png,jpeg,png|max:2097152',

            ], [
                'entr_title.required' => 'Debe escribir un titulo para el post',
                'entr_title.min' => 'el titulo debe tener min:3 letras',
                'descripcion.required' => 'Debe escribir una descripcion en el post',
                'descripcion.min' => 'la descripcion debe tener min:3 letras',
                'File01.required' => 'Debe cargar una imagen para el post',
            ]);
            if(request()->File01 !== null){
                $file = request()->File01->store('imagenes_post','public');
            }else{
                $file = "";
            }

            $entrada = new BlogModel;
            $entrada->id_usuario = Auth::user()->id;
            $entrada->titulo = request()->entr_title;
            $entrada->descripcion = request()->descripcion;
            $entrada->entrada_img = $file;
            $entrada->save();
        }
        else {
            request()->validate([
                'entr_title' => 'required|min:3',
                'descripcion' => 'required|min:3',
                'opc' => 'required',
                'File01' => 'file|mimes:jpg,png,jpeg,png|max:2097152',

            ], [
                'entr_title.required' => 'Debe escribir un titulo para el post',
                'entr_title.min' => 'el titulo debe tener min:3 letras',
                'descripcion.required' => 'Debe escribir una descripcion en el post',
                'descripcion.min' => 'la descripcion debe tener min:3 letras',
            ]);
            if(request()->File01 !== null){
                $file = request()->File01->store('imagenes_post','public');
            }else{
                $file = 0;
            }

            $id= request()->opc;
            $entrada['titulo'] = request()->entr_title;
            $entrada['descripcion'] = request()->descripcion;
            $entrada['entrada_img'] = ($file != 0)? $file : 'no_aplica' ;

            if($entrada['entrada_img'] != 'no_aplica'){
                $estado=BlogModel::where('id',$id)->update(['titulo' => $entrada['titulo'],'descripcion' => $entrada['descripcion'],'entrada_img' => $entrada['entrada_img'] ]);
            }else{
                $estado=BlogModel::where('id',$id)->update(['titulo' => $entrada['titulo'],'descripcion' => $entrada['descripcion'] ]);
            }

        }

        return redirect(route('list_entradas'))->with('status', 'Registro Guardado con exito');


    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
    //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($entrada = '0')
    {
        $dat= BlogModel::select('*')->where('id',$entrada)->get();
        $datos= $dat[0];
        $opc = $entrada;
        $title= "Actualizar";
        return view('form',compact('datos','title','opc'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update($datos, $id){


    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($entrada = '0')
    {

        $estado=BlogModel::where('id',  $entrada)->update(['estado' => 0 ]);
        return redirect(route('list_entradas'))->with('status', 'Registro Desactivado con Exito');
    }
}
