@inject('metodo','App\Http\Controllers\ExpedienteController')
@php
//Nombre del Solicitante
$nombre_solicitante= $metodo->conversionNombre($expediente->nombre_solicitante);
$nombreEmpresa= $expediente->nombre_solicitante;
$nacionalidadSolicitante=ucwords(strtolower($expediente->solicitanteNacionalidad->nacionalidad));
$estadoCivilSolicitante=ucwords(strtolower(preg_replace("/\([^)]+\)/","",$expediente->genesol_estado_civil)));
$fechaNacimientoSolicitante= $metodo->imprimirFechaNacimiento($expediente->genesol_fecha_de_nacimiento);
$curpSolicitante= $expediente->genesol_curp;

//RFC del solicitante
$rfcSolicitante=$expediente->genesol_rfc;
//Domicilio del Negocio
$domicilioNegocio= ucwords(strtolower($expediente->negocio_domicilio))." ".
" ".$expediente->negocio_dom_numero.", ".
" ".ucwords(strtolower($expediente->negocio_colonia)).", ".
' '.ucwords(strtolower($expediente->localidadzac)).", "
.ucwords(strtolower($expediente->municipio->municipio));


$lugarDeNacimientoSolicitante=ucwords(strtolower($expediente->genesol_lugar_de_nacimiento));



//Domicilio del solicitate
$domicilioSolicitante=
"Calle ".ucwords(strtolower($expediente->genesol_domicilio_particular))." Número ".
$expediente->genesol_domicilio_numero.", ".
ucwords(strtolower($expediente->genesol_colonia)).", Código Postal "
.$expediente->genesol_codigo_postal.", "
.ucwords(strtolower($expediente->genesol_municipio)). " Zacatecas.";
//Telefono del Solicitante
$telefonoSolicitante=$expediente->telcel;
//Monto del Prestamo
$montoPrestamo=number_format(floatval($expediente->monto),2);
//Meses del Plazo
$mesesDePlazo=$expediente->plazo;
//Periodo de Gracia
$periodoDeGracia=$expediente->gracia;

//Interes Ordinario
$interesOrdinario= $expediente->productoCredito->crefpanual ."% Anual";




//Nombre de Representante Legal
$representanteLegal=empty($expediente->relegal_nombre) ? "" : $metodo->conversionNombre($expediente->relegal_nombre);
//$representanteLegalNacionalidad
$representanteLegalNacionalidad= ucwords(strtolower($expediente->repLegalNacionalidad->nacionalidad));
//estado civil representante Legal
$representanteLegalEstadoCivil= ucwords(strtolower(preg_replace("/\([^)]+\)/","",$expediente->relegal_estado_civil)));
//fecha de nacimiento representante legal
$fechaNacimientoRepresentanteLegal=$metodo->imprimirFechaNacimiento($expediente->relegal_fecha_de_nacimiento);
//lugar de nacimiento Representante legal
$lugarNacimientoRepresentanteLegal= ucwords(strtolower($expediente->relegal_lugar_de_nacimiento));
//Domiclio Representante legal
$curpRepresentanteLegal= $expediente->relegal_curp;
//curp Representante legal
//rfc representante legal
$rfcRepresentanteLegal=$expediente->relegal_rfc;
//telefono Representante Legal
$telefonoRepresentanteLegal=$expediente->relegal_telefono_celular;
$domicilioRepresentanteLegal= "Calle " . ucwords(strtolower( $expediente->relegal_domicilio_particular))." ".
"Número ".$expediente->relegal_domicilio_parnumero.", ".
ucwords(strtolower($expediente->relegal_colonia)).
", Codigo Postal ".$expediente->relegal_codigo_postal.", ".ucwords(strtolower($expediente->relegal_municipio))." Zacatecas";


//Coyugue representante legal

$conyugueRepresentanteLegal=empty($expediente->conyrepleg_nombreconyusolicitan) ? "" : $metodo->conversionNombre($expediente->conyrepleg_nombreconyusolicitan);
$conyugueRepresentanteLegalEstadoCivil= ucwords(strtolower(preg_replace("/\([^)]+\)/","",$expediente->conyrepleg_estado_civil)));
$conyugueRepresentanteLegalNacionalidad= ucwords(strtolower($expediente->repLegalNacionalidad->nacionalidad));
$conyugueRepresentanteLegalFechaNacimiento=$metodo->imprimirFechaNacimiento($expediente->conyrepleg_fechacimie);
$conyugueRepresentanteLegaLugarNacimiento=ucwords(strtolower($expediente->conyrepleg_lugardenacimiento));
$conyugueRepresentanteLegalTelefono=$expediente->relegal_telefono_celular;
$conyugueRepresentanteLegalDomicilio= "Calle " . ucwords(strtolower( $expediente->conyrepleg_domicilioparticular))." ".
", ".
ucwords(strtolower($expediente->conyrepleg_colonia)).
", Codigo Postal ".$expediente->conyrepleg_codpos.", ".ucwords(strtolower($expediente->conyrepleg_municipio))." Zacatecas";

$conyugueRepresentanteLegalCurp=$expediente->conyrepleg_curp;


//Datos de garant Hipotecario
$garanteHipotecario=$metodo->conversionNombre($expediente->garhipo_nombre_del_aval);
$estadoCivilGaranteHipotecario= ucwords(strtolower(preg_replace("/\([^)]+\)/","",$expediente->garhipo_estado_civil)));
$garanteHipotecarioLugarNacimiento=ucwords(strtolower($expediente->garhipo_lugar_de_nacimiento));
$garanteHipotecarioNacionalidad= ucwords(strtolower($expediente->garanteHipNacionalidad->nacionalidad));
$garanteHipotecarioFechaNacimiento=$metodo->imprimirFechaNacimiento($expediente->garhipo_fecha_de_nacimiento);
$garanteHipotecarioLugarNacimiento=ucwords(strtolower($expediente->garhipo_lugar_de_nacimiento));
$garanteHipotecarioTelefono=$expediente->relegal_telefono_celular;

$garanteHipotecarioDomicilio= "Calle " . ucwords(strtolower( $expediente->garhipo_domicilio_particular))." ".
", ".
ucwords(strtolower($expediente->garhipo_colonia)).
", Codigo Postal ".$expediente->garhipo_codigo_postal.", ".ucwords(strtolower($expediente->garantia_municipio))." Zacatecas";

$garanteHipotecarioCurp=$expediente->garhipo_curp;









//Tipo de credito
$tipoDeCredito= $expediente->tipocredito." ".$expediente->productoCredito->producto;

$actividadNegocio= $expediente->actividad_economica;
//Destino Prestamo
$destinoPrestamo = $expediente->destino;
//Descripcion Inmueble
$descripcionInmueble=ucwords(strtolower($expediente->garantia_descrbien_inmueble))
." Ubicada en la Calle ".ucwords(strtolower($expediente->garantia_domici))." ".$expediente->garantia_dom_numero.
", ".ucwords(strtolower($expediente->garantia_colonia)).
", Codigo Postal ".ucwords(strtolower($expediente->garantia_cod_postal)).", ".
ucwords(strtolower($expediente->garantia_localidad)).", ".
ucwords(strtolower($expediente->garantia_municipio)).
", con una Superficie de ".$expediente->garantia_superf_terreno_mt." m²".
" con un Valor Comercial de ".number_format(floatval($expediente->garantia_valor),2).",
Según el Avaluo Practicado por el ".ucwords(strtolower($expediente->garantia_perito_valuador))
. " de Fecha ".$metodo->imprimirFechaAvaluo($expediente->garantia_fecha_valuacion);

$descripcionInmueble =ucwords(mb_strtolower(mb_strtoupper($descripcionInmueble, 'UTF-8')));

$numeroDeComite= intval(preg_replace('/[^0-9]+/', '', $expediente->numcomite), 10);
$numeroDeComite= ucfirst(strtolower($numeroDeComite ));
$numeroComite =$expediente->numcomite;

$tipoReunion = strpos($numeroComite, "e") === false ? "Reunión Ordinaria del H. Comité Técnico" : "Reunión Extraodinaria del H. Comité Técnico";
$fechaComite= $metodo->imprimirFechaNacimiento($expediente->fecha_reunion_comite);

$interesMoral= intval(preg_replace('/[^0-9]+/', '', $expediente->ProductoCredito->crefpmensualmora), 10);

$parteEnteraInteresMoral= intval( $interesMoral/10);

if($parteEnteraInteresMoral >=1 ){
$porcentajeInteresMoral = intval( $interesMoral/10) . ".". $interesMoral%10;
} else {
$porcentajeInteresMoral = $interesMoral %10;
}


$interesAnualMoral= intval(preg_replace('/[^0-9]+/', '', $expediente->ProductoCredito->crefpanualmora), 10);



$parteEnteraInteresAnualMoral= intval( $interesMoral/10);



if($parteEnteraInteresAnualMoral >=1 ){
$porcentajeInteresAnualMoral = intval( $interesAnualMoral/10) . ".". $interesAnualMoral%10;
} else {
$porcentajeInteresAnualMoral = $interesAnualMoral %10;
}





//Nombre del conyugue del aval
$nombreConyugueAval= $metodo->conversionNombre($expediente->conav_nombconyugaval);
$estadoCivilConyugueAval =ucwords(strtolower(preg_replace("/\([^)]+\)/","",$expediente->conav_estcivilconaval)));
$fechaNacimientoConyugueAval =$fechaNacimientoSolicitante= $metodo->imprimirFechaNacimiento($expediente->conav_fechnacconyaval);
$conyugueAvalLugarNacimiento=ucwords(mb_strtolower($expediente->conav_lugarnaconyuaval));
$curpConyugueAval= $expediente->conav_curpconaval;

$domicilioConyugueAval= "Calle " . ucwords(strtolower( $expediente->conyav_dompartconyuaval))." ".
", ".
ucwords(strtolower($expediente->conav_colconyugueaval))
.", ".ucwords(strtolower($expediente->conav_municonyaval))." Zacatecas";

$nacionalidadConyugueAval=ucwords(strtolower($expediente->conyAvalNacionalidad->nacionalidad));

$garanteHipotecarioCurp=$expediente->garhipo_curp;
















@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instruccion al Notario</title>

    <style type="text/css">
        #topright {
            position: absolute;
            right: 0;
            top: 0;
            display: block;
            height: 125px;
            width: 125px;
            background: url(TRbanner.gif) no-repeat;
            text-indent: -999em;
            text-decoration: none;
        }

        table {
            border-collapse: collapse;
        }

        html {
            margin: 0;
        }

        body {
            font-family: "Arial", serif;
            font-size: 10px;
            margin: 12mm 12mm 12mm 12mm;
        }
    </style>

</head>

<body>

    <div id="content">
        <img src="{{ public_path('/img/logo_fondo.jpg')}}" height="70px" />
    </div>

    <p ALIGN="right">
        <strong>Asunto: &nbsp; Instrución para Contrato</strong><br>
        FPZ/0648/2020<br>
        Zacatecas, Zac, a 03 de Julio de 2020
    </p>

    <p ALIGN="left">
        <strong>
        Lic. José Guadalupe Estrada Rodriguez <br>
        Notario Público No 46<br>
        Zacatecas, Zacatecas <br>
        Presente<br>
        </strong>
    </p>



    <p align="justify">Por medio de la presente, nos dirigimos a usted de la manera más atenta, con el fin de que
        nos elabore un contrato de crédito con los siguientes datos:
    </p>

    <table width="100%" border="1">

        @if($expediente->relegal_nombre !="")
        <tr>

            <td width="20%" BGCOLOR="#EAE5E5">

                <strong>
                    Nombre de la empresa
                </strong>
            </td>
            <td>
                {{$nombreEmpresa}}
            </td>
        </tr>

        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Representante Legal
                </strong>

            </td>
            <td>
                {{$representanteLegal}}
            </td>

        </tr>





        @else
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Nombre del solicitante
                </strong>
            </td>
            <td>
                {{$nombre_solicitante}}
            </td>
        </tr>
        @endif


        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Domicilio Del Negocio
                </strong>
            </td>
            <td>
                {{$domicilioNegocio}}
            </td>
        </tr>

        @if($representanteLegal != "")

        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Domiclio Particular
                </strong>

            </td>
            <td>
                {{$domicilioRepresentanteLegal}}
            </td>
        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    R.F.C
                </strong>

            </td>
            <td>{{$rfcRepresentanteLegal}}</td>
        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Telefono
                </strong>

            </td>
            <td>
                {{$telefonoRepresentanteLegal}}
            </td>
        </tr>
        @else

        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Domiclio Particular
                </strong>

            </td>
            <td>
                {{$domicilioSolicitante}}
            </td>
        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    R.F.C
                </strong>

            </td>
            <td>{{$rfcSolicitante}}</td>
        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Telefono
                </strong>

            </td>
            <td BGCOLOR="#EAE5E5">
                {{$telefonoSolicitante}}
            </td>
        </tr>
        @endif

    </table>

    <br>

    <!--Datos referentes al producto del credito-->

    <table width="100%" border="1">
        <thead>
            <th BGCOLOR="#EAE5E5" width="28%">Tipo de Crédito</th>
            <th BGCOLOR="#EAE5E5">

                Monto del <br>
                Crédito

            </th>
            <th BGCOLOR="#EAE5E5">
                Plazo Total Meses
            </th>
            <th BGCOLOR="#EAE5E5">
                Gracia<br>
                Capital<br>
                Meses <br>
            </th>

            <th BGCOLOR="#EAE5E5">
                Interés<br>
                (Ordinario)<br>
                4 meses
            </th>
            <th BGCOLOR="#EAE5E5">
                Interés<br>
                (Ordinario)<br>
                32 meses
            </th>

            <th BGCOLOR="#EAE5E5">
                Interés <br>
                (Moral)<br>
                Mensual<br>
            </th>
            <th BGCOLOR="#EAE5E5">Comisión
                <br> por
                apertura
            </th>

        </thead>
        <tr>
            <td>
                <center>
                    {{$tipoDeCredito}}
                </center>

            </td>
            <td>

                <center>
                    {{$montoPrestamo}}
                </center>

            </td>
            <td>

                <center>
                    {{$mesesDePlazo}}
                </center>

            </td>
            <td>

                <center>
                    {{$periodoDeGracia}}
                </center>

            </td>
            <td>

                <center>
                    {{$interesOrdinario}}
                </center>

            </td>
            <td>
                <center>
                    {{$porcentajeInteresAnualMoral}}
                </center>

            </td>
            <td>

                <center>
                    {{$porcentajeInteresMoral}}%
                </center>

            </td>
            <td>
                <center>
                    0%
                </center>

            </td>
        </tr>
    </table>
    <br>

    <table width="100%" border="1">
        <thead>
            <th BGCOLOR="#EAE5E5">Actividad</th>
            <th BGCOLOR="#EAE5E5">Destino</th>
        </thead>
        <tr>
            <td>{{$actividadNegocio}}</td>
            <td> {{$destinoPrestamo}}</td>
        </tr>
    </table>
    <br>

    <table width="100%" border="1">
        <tr>

            <td BGCOLOR="#EAE5E5">
                {{$numeroDeComite}}
            </td>
            <td>
                <strong>
                    {{$tipoReunion}}
                </strong>
            </td>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    de fecha
                </strong>
            </td>
            <td>{{$fechaComite}}</td>
        </tr>
    </table>
    <br>

    <table width="100%" border="1">
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Descripción de Garantías
                </strong>
            </td>
            <td style=" text-align: justify; padding-right:5px;"> {{$descripcionInmueble}}</td>
        </tr>
    </table>
    <br>



    @if($representanteLegal != "" )


    <table width="70%" border="1">
        <caption> Representante Legal y Garante Hipotecario</caption>

        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Nombre
                </strong>
            </td>
            <td>{{$representanteLegal}}</td>

            @if($conyugueRepresentanteLegal != "" )
            <td>
                {{$conyugueRepresentanteLegal}}
            </td>
            @endif

        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Nacionalidad
                </strong>
            </td>
            <td>{{$representanteLegalNacionalidad}}</td>

            @if($conyugueRepresentanteLegal != "" )
            <td>
                {{$conyugueRepresentanteLegalNacionalidad}}
            </td>
            @endif


        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Estado Civil
                </strong>
            </td>
            <td>{{$representanteLegalEstadoCivil}}</td>


            @if($conyugueRepresentanteLegal != "" )
            <td>
                {{$conyugueRepresentanteLegalEstadoCivil}}
            </td>
            @endif


        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Fecha de Nacimeinto
                </strong>
            </td>
            <td>{{$fechaNacimientoRepresentanteLegal}}</td>

            @if($conyugueRepresentanteLegal != "" )
            <td>
                {{$conyugueRepresentanteLegalFechaNacimiento}}
            </td>
            @endif


        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Lugar de Nacimiento
                </strong>

            </td>
            <td>{{$lugarNacimientoRepresentanteLegal}}</td>

            @if($conyugueRepresentanteLegal != "" )
            <td>
                {{$conyugueRepresentanteLegaLugarNacimiento}}
            </td>
            @endif


        </tr>


        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Domicilio Particular
                </strong>

            </td>
            <td>{{$domicilioRepresentanteLegal}}</td>

            @if($conyugueRepresentanteLegal != "" )
            <td>
                {{$conyugueRepresentanteLegalDomicilio}}
            </td>
            @endif


        </tr>

        <tr>
            <td BGCOLOR="#EAE5E5" <strong>
                CURP
                </strong>
            </td>
            <td>{{$curpRepresentanteLegal}}</td>

            @if($conyugueRepresentanteLegal != "" )
            <td>
                {{$conyugueRepresentanteLegalCurp}}
            </td>
            @endif

        </tr>
    </table>
    @else

    <table width="70%" border="1">
        <caption> Acreditado   </caption>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Nombre de Acreditado
                </strong>
            </td>
            <td>{{$nombre_solicitante}}</td>
        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Nacionalidad
                </strong>
            </td>
            <td>{{$nacionalidadSolicitante}}</td>
        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Estado Civil
                </strong>
            </td>
            <td>{{$estadoCivilSolicitante}}</td>
        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Fecha de Nacimiento
                </strong>
            </td>
            <td>{{$fechaNacimientoSolicitante}}</td>
        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Lugar de Nacimiento
                </strong>

            </td>
            <td>
                {{$lugarDeNacimientoSolicitante}}
            </td>
        </tr>


        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Domiclio Particular
                </strong>

            </td>
            <td>{{$domicilioSolicitante}}</td>
        </tr>

        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    CURP
                </strong>
            </td>
            <td>
                {{$curpSolicitante}}
            </td>
        </tr>
    </table>

    @endif

    @if($representanteLegal !="")
    @if($garanteHipotecario != $representanteLegal)

   
    <table width="70%" border="1">
        <caption> Garante Hipotecario por Sociedad Conyugal  </caption>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Nombre
                </strong>
            </td>
            <td>{{$garanteHipotecario}}</td>

            @if($nombreConyugueAval != "" )
            <td>
                {{$nombreConyugueAval}}
            </td>
            @endif
        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Nacionalidad
                </strong>
            </td>
            <td>{{$garanteHipotecarioNacionalidad}}</td>
            @if($nombreConyugueAval != "" )
            <td>
                {{$nacionalidadConyugueAval}}
            </td>
            @endif

          
        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Estado Civil
                </strong>
            </td>
            <td>{{$estadoCivilGaranteHipotecario}}</td>

            @if($nombreConyugueAval != "" )
            <td>
                {{$estadoCivilConyugueAval}}
            </td>
            @endif


        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Fecha de Nacimiento
                </strong>
            </td>
            <td>{{$garanteHipotecarioFechaNacimiento}}</td>

            @if($nombreConyugueAval != "" )
            <td>
                {{$fechaNacimientoConyugueAval}}
            </td>
            @endif

        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Lugar de Nacimiento
                </strong>

            </td>
            <td>
                {{$garanteHipotecarioLugarNacimiento}}
            </td>

            @if($nombreConyugueAval != "" )
            <td>
                {{$conyugueAvalLugarNacimiento}}
            </td>
            @endif

          
        </tr>


        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Domiclio Particular
                </strong>

            </td>
            <td>{{$garanteHipotecarioDomicilio}}</td>
            @if($nombreConyugueAval != "" )
            <td>
                {{$garanteHipotecarioDomicilio}}
            </td>
            @endif
        </tr>

        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    CURP
                </strong>
            </td>
            <td>
                {{$garanteHipotecarioCurp}}
            </td>
            @if($nombreConyugueAval != "" )
            <td>
                {{$curpConyugueAval}}
            </td>
            @endif




        </tr>
    </table>

    @endif
    @endif


    @if(empty($representanteLegal) )
    @if($garanteHipotecario != $representanteLegal)
   
   
    <table width="70%" border="1">
        <caption> Garante Hipotecario por Sociedad Conyugal  </caption>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Nombre
                </strong>
            </td>
            <td>{{$garanteHipotecario}}</td>

            @if($nombreConyugueAval != "" )
            <td>
                {{$nombreConyugueAval}}
            </td>
            @endif
        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Nacionalidad
                </strong>
            </td>
            <td>{{$garanteHipotecarioNacionalidad}}</td>
            @if($nombreConyugueAval != "" )
            <td>
                {{$nacionalidadConyugueAval}}
            </td>
            @endif

          
        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Estado Civil
                </strong>
            </td>
            <td>{{$estadoCivilGaranteHipotecario}}</td>

            @if($nombreConyugueAval != "" )
            <td>
                {{$estadoCivilConyugueAval}}
            </td>
            @endif


        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Fecha de Nacimiento
                </strong>
            </td>
            <td>{{$garanteHipotecarioFechaNacimiento}}</td>

            @if($nombreConyugueAval != "" )
            <td>
                {{$fechaNacimientoConyugueAval}}
            </td>
            @endif

        </tr>
        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Lugar de Nacimiento
                </strong>

            </td>
            <td>
                {{$garanteHipotecarioLugarNacimiento}}
            </td>

            @if($nombreConyugueAval != "" )
            <td>
                {{$conyugueAvalLugarNacimiento}}
            </td>
            @endif

          
        </tr>


        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    Domiclio Particular
                </strong>

            </td>
            <td>{{$garanteHipotecarioDomicilio}}</td>
            @if($nombreConyugueAval != "" )
            <td>
                {{$garanteHipotecarioDomicilio}}
            </td>
            @endif
        </tr>

        <tr>
            <td BGCOLOR="#EAE5E5">
                <strong>
                    CURP
                </strong>
            </td>
            <td>
                {{$garanteHipotecarioCurp}}
            </td>
            @if($nombreConyugueAval != "" )
            <td>
                {{$curpConyugueAval}}
            </td>
            @endif




        </tr>
    </table>

    @endif
    @endif




    <p ALIGN="justify">
        @if($representanteLegal== "")
        A).- Se Anexan Copias de Actas de Nacimiento, Matrimonio,Comprobante de Domicilio, R.FC y CURP.<br>
        B).- Se Anexan Copias de la Escritura, Certificado e Libertad de Gravamen, Avalúo y recibo de Pago de
        Predial.
        @else
        A).-Se anexan copias de Acta Constituitica y Actas de Asamblea Ordinarias
        B).-Se anexan copias de acta de nacimiento, matrimonio, identificación, comprobante de domicilio, cédula de R.F.C y CURP
        C).-Se anexan copias de la Escritura, Certificacion de libertad de gravamen, Avaluo y Recibo de pago de impuesto predial
        @endif

    </p>

    <p>
        Sin otro particular por el momento, aprovecho la ocasión para enviarle un cordial saludo.
    </p>




    <p ALIGN="center">
        ATENTAMENTE <br> <br>
        <strong>L.C Felipe Ignacio Ávalo Pérez </strong><br>
        Director

    </p>
    <br>

    <p ALIGN="justify" style="font-size: 12px">
        Boulevard Jóse López Portillo No. 220-9,
        Fracc. Las Colinas, Zacateca Zac. C.p 98098,
        Tel. 492 491 5034, Ext 36400 <br>
        www.fondoplata.zacatecas.gob.mx
    </p>



    <p>
    
   
    </p>










</body>

</html>