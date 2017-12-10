<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Inventario;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventario=Inventario::orderBy('id','desc')->get();
        return view('admin.inventario.index',compact('inventario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.inventario.create');
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
            $inventario=new Inventario;
            $inventario->producto=$request->producto;
            $inventario->marca=$request->marca;
            $inventario->cantidad=$request->cantidad;
            $inventario->save();
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
        $dataEdit=Inventario::find($id);
          if(empty($dataEdit))
            abort(404);
          return view('admin.inventario.edit',compact('dataEdit'));
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
            $inventario=Inventario::findOrFail($id);
            $inventario->update($request->all());
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

    public function showPlus($id)
    {
      return view('admin.inventario.showPlus',compact('id'));
    }

    public function storePlus(Request $request)
    {
      try {
        $id=$request->id;
        $producto=Inventario::findOrFail($id);
        $producto->cantidad+=$request->cantidad;
        $producto->save();
        return redirect()->back()->with('message','Registro Editado correctamente.');
      } catch (Exception $e) {
        return redirect()->back()->with("error", "No se pudo realizar la acción.");
      }



    }
}
