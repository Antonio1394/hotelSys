<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Habitacion;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente=Cliente::orderBy('id','desc')->get();
        return view('admin.cliente.index',compact('cliente'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
          $cliente= new Cliente;
          $cliente->nombre=$request->nombre;
          $cliente->apellido=$request->apellido;
          $cliente->direccion=$request->direccion;
          $cliente->telefono=$request->telefono;
          $cliente->dpi=$request->dpi;
          $cliente->ocupacion=$request->ocupacion;
          $cliente->email=$request->email;
          if($request->nit=="")
            $cliente->nit='C/F';
          else
            $cliente->nit=$request->nit;
          $cliente->save();
          return redirect()->back()->with('message','Registro creado correctamente.');
        } catch (Exception $e) {
            return redirect()->back()->with("error", "No se pudo realizar la acción.". $e->getMessage());
        }

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
    public function edit($id)
    {
       $dataEdit=Cliente::find($id);
       if (empty($dataEdit))
            abort(404);
        return view('admin.cliente.edit',compact('dataEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {
            $cliente=Cliente::findOrFail($id);
            $cliente->nombre=$request->nombre;
            $cliente->apellido=$request->apellido;
            $cliente->direccion=$request->direccion;
            $cliente->telefono=$request->telefono;
            $cliente->dpi=$request->dpi;
            $cliente->ocupacion=$request->ocupacion;
            $cliente->email=$request->email;
            if($request->nit=="")
              $cliente->nit='C/F';
            else
              $cliente->nit=$request->nit;
            $cliente->save();
            return redirect()->back()->with('message','Registro Editado correctamente.');
        } catch (Exception $e) {
            return redirect()->back()->with("error", "No se pudo realizar la acción.");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verifyDpi(Request $request)
    {
        $number=Cliente::where('dpi',$request->dataArray['dpi'])->count();
        $res=($number==0)? "ok":"error";
        return $res;
    }

    public function verifyDpiEdit(Request $request)
    {
        $number=Cliente::where('dpi',$request->dataArray['dpi'])
                        ->where('id','!=',$request->dataArray['id'])
                        ->count();
        $res=($number==0)? "ok":"error";
        return $res;
    }

    public function verifyNit(Request $request)
    {
        $number=Cliente::where('nit',$request->dataArray['nit'])->count();
        $res=($number==0)? "ok":"error";
        return $res;
    }

    public function verifyNitEdit(Request $request)
    {
      $number=Cliente::where('nit',$request->dataArray['nit'])
                      ->where('id','!=',$request->dataArray['id'])
                      ->count();
      $res=($number==0)? "ok":"error";
      return $res;
    }

    ////Vista para descuento del cliente

    public function showDiscount($id)
    {
      $habitacion=Habitacion::findOrFail(1);
      return view('admin.cliente.showDiscount',compact('id','habitacion'));
    }
}
