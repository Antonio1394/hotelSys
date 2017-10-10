<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
Use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user=User::orderBy('id','desc')->get();
        return view ('admin.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
          $user= new User;
          $user->name=$request->name;
          $user->user=$request->user;
          $user->password=$request->password;
          $user->tipo=$request->tipo;
          $user->estado=1;
          $user->save();
          return redirect()->back()->with('message','Registro creado correctamente.');
      } catch (Exception $e) {
          return redirect()->back()->with("error", "No se pudo realizar la acción.". $e->getMessage());
      }

    }

    public function verifycreate (Request $request)
    {
        $number=User::where('user',$request->dataArray['user'])->count();
        $res=($number == 0) ? "ok" : "error";
        return $res;
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

        $dataEdit=User::find($id);
        if( empty($dataEdit) )
            abort(404);
        return view('admin.user.edit',compact('dataEdit'));
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
            $user=User::findOrFail($id);
            $user->update($request->all());
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
}
