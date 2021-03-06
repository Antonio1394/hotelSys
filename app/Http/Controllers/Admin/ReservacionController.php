<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Reservacion;
use App\Models\Cliente;
use App\Models\TipoVehiculo;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo=$this->fillCombo(TipoVehiculo::all(),'descripcion');
        return view('admin.reservacion.create',compact('tipo'));
    }

    public function verifyDpi($dpiData)
    {

        $cliente=Cliente::where('dpi','=', $dpiData)->get();
        $num=Cliente::where('dpi','=', $dpiData)->count();
        if ($num!=0) {
          return response()->json(['cliente'=> $cliente], 200);
        }else {
          return 'error';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
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
        //
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
        //
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

    private function fillCombo($data, $field)
    {
        $dataCombo = ['' => 'Seleccione una opción'];

        foreach ($data as $value) {
            //$dataCombo[$value->id] = $value->$field;
            $dataCombo[$value->id] = $value->$field;

        }

        return $dataCombo;
    }
}
