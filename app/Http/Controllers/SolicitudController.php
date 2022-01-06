<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class SolicitudController extends Controller
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
            $id_institucion=$consulta[0]->id_institucion;

            $sql2="SELECT id_solicitud, fecha, estatus, cantidad_donadores, nombre, urgente, solicitudes.tipo_sangre FROM solicitudes, pacientes
            where solicitudes.estatus != 'CANCELADA' and solicitudes.id_paciente = pacientes.id_paciente and solicitudes.id_institucion = ? order by fecha";

            $solicitudes = DB::select($sql2, array($id_institucion));
            return $solicitudes;
        }

        return 0;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $solicitud)
    {
        $email = auth()->user()->email;
        $sql= "SELECT id_institucion, id_medico from medicos where email=?";
        $consulta = DB::select($sql, array($email));

        if($consulta!=null)
        {
            $id_institucion=$consulta[0]->id_institucion;
            $id_medico=$consulta[0]->id_medico;
            $fecha = Carbon::now()->toDateTimeString();
            $cantidad_donadores = $solicitud->cantidad_donadores;
            $urgente = $solicitud->urgente;
            $tipo_sangre = $solicitud->tipo_sangre;
            $id_paciente = $solicitud->id_paciente;

            $id = DB::table('solicitudes')->insertGetId(
                array('fecha' => $fecha,
                'estatus' => 'VIGENTE',
                'cantidad_donadores' => $cantidad_donadores,
                'urgente' => $urgente,
                'tipo_sangre' => $tipo_sangre,
                'id_medico' => $id_medico,
                'id_paciente' => $id_paciente,
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
    public function update($id)
    {
        if(session()){
            $affected = DB::table('solicitudes')
            ->where('id_solicitud', $id)
            ->update(['estatus' => 'ATENDIDA']);
            error_log($id);
            return $id;
        }
        else{
            return 0;
        }
    }
    public function editar(Request $solicitud)
    {
        if(session()){
            $affected = DB::table('solicitudes')
            ->where('id_solicitud', $solicitud->id_solicitud)
            ->update(['cantidad_donadores' => $solicitud->cantidad_donadores,
            'urgente' => $solicitud->urgente,
            'tipo_sangre' => $solicitud->tipo_sangre,
            ]);
            return $affected;
        }
        else{
            return 0;
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
        if(session()){
            $affected = DB::table('solicitudes')
            ->where('id_solicitud', $id)
            ->update(['estatus' => 'CANCELADA']);
            error_log($id);
            return $id;
        }
        else{
            return 0;
        }
    }
}
