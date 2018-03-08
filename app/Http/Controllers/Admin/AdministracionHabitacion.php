<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Habitacion;
class AdministracionHabitacion extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habitacion=Habitacion::orderBy('id','desc')->get();
        return view('admin.habitacion.admin.index',compact('habitacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.habitacion.admin.create');
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
            $habitacion=new Habitacion;
            $habitacion->noHabitacion=$request->noHabitacion;
            $habitacion->nivel=$request->nivel;
            $habitacion->estado=1;
            $habitacion->tarifa=$request->tarifa;
            $habitacion->tarifaFinDe=$request->tarifaFinDe;
            $habitacion->tarifaPersona=$request->tarifaPersona;
            $habitacion->save();
            return redirect()->back()->with('message','Registro creado correctamente.');
        } catch (\Exception $e) {
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
        $dataEdit=Habitacion::find($id);
        if (empty($dataEdit))
            abort(404);
        return view('admin.habitacion.admin.edit',compact('dataEdit'));

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
            $habitacion=Habitacion::findOrFail($id);
            $habitacion->update($request->all());
            return redirect()->back()->with('message','Registro Editado correctamente.');
        } catch (\Exception $e) {
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
}
