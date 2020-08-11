<?php

namespace App\Http\Controllers;

use App\Expediente;
use Illuminate\Http\Request;
use PDF;
use App\Helpers\Convertidor;
use Illuminate\Support\Carbon;

use Luecano\NumeroALetras\NumeroALetras;

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

      $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
      ->loadView('expedientes.contrato-pdf', ['expediente' => $expediente])
      ->setPaper('legal');

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

    return $nombres . " " . $apellidos;
  }

  public function numeroComiteEnletras($numeroComiteEnLetras)
  {
    $numeroComite = intval(preg_replace('/[^0-9]+/', '', $numeroComiteEnLetras), 10);
    $formatter = new NumeroALetras;
    $numeroEnLetras = $formatter->toWords($numeroComite);
    return $numeroEnLetras . "AVA";
  }




  public function fechaParaImprimirContrato($fecha)
  {
    $anio = substr($fecha, 0, 4);
    $mes = substr($fecha, -5, -3);
    $dia = substr($fecha, -2);

    $formatter = new NumeroALetras;
    $diaEnLetras = $formatter->toWords($dia);

    $formatterAnio = new NumeroALetras;
    $anioEnLetras = $formatterAnio->toWords($anio);

    //dd($diaEnLetras);

    return $dia . " (" . $diaEnLetras . ") DE " . $this->nombreMes($mes) . " DEL AÑO " . $anio . " (" . $anioEnLetras . ".)";
  }

  public function nombreMes($mes)
  {
    switch ($mes) {
      case 1:
        return "ENERO";
        break;
      case 2:
        return "FEBRERO";
        break;
      case 3:
        return "MARZO";
        break;
      case 4:
        return "ABRIL";
        break;

      case 5:
        return "MAYO";
        break;

      case 6:
        return "JUNIO";
        break;

      case 7:
        return "JULIO";
        break;

      case 8:
        return "AGOSTO";
        break;

      case 9:
        return "SEPTIEMBRE";
        break;

      case 10:
        return "OCTUBRE";
        break;

      case 11:
        return "NOVIEMBRE";
        break;

      case 12:
        return "DICIEMBRE";
        break;
    }
  }


  public function dineroEnLetras($monto)
  {
    $valor = Convertidor::dineroEnletra($monto);
    return $valor;
  }

  public function soloNumeroALetras($numero)
  {
    $formatter = new NumeroALetras;
    return $formatter->toWords($numero);
  }

  public function imprimirFechaNacimiento($fechaNacimiento)
  {
    $anio = substr($fechaNacimiento, 0, 4);
    $mes = substr($fechaNacimiento, -5, -3);
    $dia = substr($fechaNacimiento, -2);
    return $dia . " de " . ucwords(strtolower($this->nombreMes($mes))) . " del " . $anio;
  }

  public function imprimirFechaFirmaContrato()
  {
    $fechaActual = Carbon::now();
    $fechaActual = $fechaActual->format('Y-m-d');
    $anio = substr($fechaActual, 0, 4);
    $mes = substr($fechaActual, -5, -3);
    $dia = substr($fechaActual, -2);



    $formatter = new NumeroALetras;
    $diaEnLetras = $formatter->toWords($dia);

    $formatterAnio = new NumeroALetras;
    $anioEnLetras = $formatterAnio->toWords($anio);


    return ucwords(strtolower($diaEnLetras)) . " Dias de " . ucwords(strtolower($this->nombreMes($mes))) . " Del " . ucwords(strtolower($anioEnLetras));
  }



  public function    prueba()
  {
    $fechaActual = Carbon::now();
    $fechaActual = $fechaActual->format('Y-m-d');
    $anio = substr($fechaActual, 0, 4);
    $mes = substr($fechaActual, -5, -3);
    $dia = substr($fechaActual, -2);

    dd($fechaActual);
  }

  public function instruccionAlNotario($id_expediente)
  {
    $expediente = Expediente::where('id_expediente', '=', $id_expediente)
      ->first();

    


    if ($expediente->relegal_nombre != "") {
      if ($expediente->relegal_nombre != $expediente->garhipo_nombre_del_aval) {
          $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
          ->loadView('expedientes.instruccion-al-notario', ['expediente' => $expediente])
          ->setPaper('legal');


          return $pdf->download('Carta Al Notario.pdf');

      } elseif($expediente->relegal_nombre == $expediente->garhipo_nombre_del_aval){
        if($expediente->conav_nombconyugaval == ""){
          $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
          ->loadView('expedientes.instruccion-al-notario', ['expediente' => $expediente])
          ->setPaper('letter');
  
  
          return $pdf->download('Carta Al Notario.pdf');

        }else{

          $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
          ->loadView('expedientes.instruccion-al-notario', ['expediente' => $expediente])
          ->setPaper('legal');
  
          return $pdf->download('Carta Al Notario.pdf');
        }
     
      }

      
    } elseif ($expediente->garhipo_nombre_del_aval != null  && $expediente->garhipo_nombre_del_aval != $expediente->nombre_solicitante) {


      $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
        ->loadView('expedientes.instruccion-al-notario', ['expediente' => $expediente])
        ->setPaper('legal');

      return $pdf->download('Carta Al Notario.pdf');
    } elseif (
      $expediente->relegal_nombre == "" &&
      ($expediente->garhipo_nombre_del_aval == null || $expediente->nombre_solicitante == $expediente->garhipo_nombre_del_aval)
      && $expediente->conav_nombconyugaval == ""
    ) {




      $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
        ->loadView('expedientes.instruccion-al-notario', ['expediente' => $expediente])
        ->setPaper('letter');
      return $pdf->download('Carta Al Notario.pdf');
    } else {


      $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
        ->loadView('expedientes.instruccion-al-notario', ['expediente' => $expediente])
        ->setPaper('legal', 'portrait');
      return $pdf->download('Carta Al Notario.pdf');
    }
  }



  public function imprimirFechaAvaluo($fechaAvaluo)
  {
    $anio = substr($fechaAvaluo, 0, 4);
    $mes = substr($fechaAvaluo, -5, -3);
    $dia = substr($fechaAvaluo, -2);
    return $dia . " De " . ucwords(strtolower($this->nombreMes($mes))) . " Del " . $anio;
  }


  public function nombreActividad($actividadNegocio)
  {

    // dd($actividadNegocio);

    // dd(strpos($actividadNegocio, "COMERCIALIZACION DE")== true);

    //se puede hacer la comparacion con 'false' o 'true' y los comparadores '===' o '!=='
    if (stripos($actividadNegocio, "COMERCIALIZACION") == true) {
      $cadenaFormateada = str_replace(",", "", $actividadNegocio);
      $cadenaFormateada = str_replace("COMERCIALIZACION DE", "", $actividadNegocio);
      return $actividadNegocio = "Comerzializacion de " . strtolower($cadenaFormateada);
    } elseif (stripos($actividadNegocio, "FABRICACION DE") == true) {
      $cadenaFormateada = str_replace(",", "", $actividadNegocio);
      $cadenaFormateada = str_replace("FABRICACION DE", "", $actividadNegocio);
      return $actividadNegocio = "Fabricacion de " . strtolower($cadenaFormateada);
    } elseif (stripos($actividadNegocio, "ELABORACION DE") == true) {



      $cadenaFormateada = str_replace(",", "", $actividadNegocio);
      $cadenaFormateada = str_replace("ELABORACION DE", "", $actividadNegocio);
      return $actividadNegocio = "Elaboracion de " . strtolower($cadenaFormateada);
    } elseif (stripos($actividadNegocio, "SERVCIOS DE") == true) {

      $cadenaFormateada = str_replace(",", "", $actividadNegocio);
      $cadenaFormateada = str_replace("SERVICIOS DE", "", $actividadNegocio);
      return $actividadNegocio = "Servicios de " . strtolower($cadenaFormateada);
    } elseif (stripos($actividadNegocio, "COMERCIALIZACION ARTICULOS DE") == true) {
      $actividadNegocio = "Comercializacion de articulos de " . strtolower($cadenaFormateada);
    } else {
      $actividadNegocio = $actividadNegocio;
    }
  }
}
