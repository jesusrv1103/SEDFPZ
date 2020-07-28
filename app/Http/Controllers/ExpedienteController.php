<?php

namespace App\Http\Controllers;

use App\Expediente;
use Illuminate\Http\Request;
use PDF;

class ExpedienteController extends Controller
{
    public function index(Request $request)
    {
        $idEstatus = $request->get('idEstatus');

        $idPrograma = $request->get('idPrograma');

        $expedientes = Expediente::select(
            'id_expediente',
            'nombre_solicitante',
            'fecha_recepcion',
            'id_municipio',
            'monto',
            'id_sector',
            'tipocredito',
            'id_turnado',
            'fecha_asignacion_analista',
            'id_estatus',
            'fecha_terminacion'
        )
            ->where('id_expediente', '>', 6000)
            ->estatus($idEstatus)->programas($idPrograma)->orderBy('fecha_recepcion', 'DESC')->get();
        return view('expedientes.index', compact('expedientes'));
    }


    public function descargarContrato($id_expediente)
    {
        $expediente = Expediente::where('id_expediente', '=', $id_expediente)
            ->first();
        $pdf = PDF::loadView('expedientes.contrato-pdf', compact('expediente'));
        return $pdf->download('ejemplo.pdf');
    }


    public function conversionNombre($nombre)
    {
        /* separar el nombre completo en espacios */
        $tokens = explode(' ', trim($nombre));
        /* arreglo donde se guardan las "palabras" del nombre */
        $names = array();
        /* palabras de apellidos (y nombres) compuetos */
        $special_tokens = array('da', 'de', 'del', 'la', 'las', 'los', 'mac', 'mc', 'van', 'von', 'y', 'i', 'san', 'santa');

        $prev = "";
        foreach ($tokens as $token) {
            $_token = strtolower($token);
            if (in_array($_token, $special_tokens)) {
                $prev .= "$token ";
            } else {
                $names[] = $prev . $token;
                $prev = "";
            }
        }

        $num_nombres = count($names);
        $nombres = $apellidos = "";
        switch ($num_nombres) {
            case 0:
                $nombres = '';
                break;
            case 1:
                $nombres = $names[0];
                break;
            case 2:
                $nombres    = $names[0];
                $apellidos  = $names[1];
                break;
            case 3:
                $apellidos = $names[0] . ' ' . $names[1];
                $nombres   = $names[2];
            default:
                $apellidos = $names[0] . ' ' . $names[1];
                unset($names[0]);
                unset($names[1]);

                $nombres = implode(' ', $names);
                break;
        }

        $nombres    = mb_convert_case($nombres, MB_CASE_TITLE, 'UTF-8');
        $apellidos  = mb_convert_case($apellidos, MB_CASE_TITLE, 'UTF-8');
       
        return $nombres ." ". $apellidos;
    }
}
