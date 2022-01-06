<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;


class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = auth()->user()->email;
        $sql= "SELECT id_institucion from medicos where email=?";
        $consulta = DB::select($sql, array($email));
        if($consulta!=null)
        {
            $sql2="SELECT
                *
                from  pacientes
                where
                id_institucion = ? order by nombre";
            $pacientes = DB::select($sql2, array($consulta[0]->id_institucion));
            return $pacientes;

        }
        return 0;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = auth()->user()->email;
        $sql= "SELECT id_institucion from medicos where email=?";
        $consulta = DB::select($sql, array($email));
        if($consulta!=null)
        {
            $id_institucion=$consulta[0]->id_institucion;
            $fecha_nacimiento = $request->fecha_nacimiento;
            $nombre = $request->nombre;
            $tipo_sangre = $request->tipo_sangre;

            $id = DB::table('pacientes')->insertGetId(
                array('fecha_nacimiento' => $fecha_nacimiento,
                'nombre' => $nombre,
                'tipo_sangre' => $tipo_sangre,
                'id_institucion' => $id_institucion,
                )
            );
            return $id;

        }
        return 0;
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
}
