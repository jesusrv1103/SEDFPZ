@inject('metodo','App\Http\Controllers\ExpedienteController')
@php
//Nombre del Solicitante
$nombre_solicitante= $metodo->conversionNombre($expediente->nombre_solicitante);
$nombreEmpresa=!isset($representanteLegal) ? $expediente->nombre_solicitante : "";
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
"Código Postal ".$expediente->negocio_codigo_postal.
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
$telefonoCelularSolicitante=$expediente->telcel;
$telefonoParticularSolicitante=$expediente->telparticular;
//Monto del Prestamo
$montoPrestamo=!isset($expediente->monto)? "" :number_format(floatval($expediente->monto),2);
//Meses del Plazo
$mesesDePlazo=$expediente->plazo;
//Periodo de Gracia
$periodoDeGracia=$expediente->gracia;

//Interes Ordinario
$interesOrdinario= $expediente->productoCredito->crefpanual ."% Anual";

$sexoSolicitante =substr($curpSolicitante,-8,1);






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
", Codigo Postal ".$expediente->relegal_codigo_postal.", ".ucwords(strtolower($expediente->relegal_municipio))."
Zacatecas";

$sexoRepresentanteLegal= substr($curpRepresentanteLegal,-8,1);



//Coyugue representante legal

$conyugueRepresentanteLegal=empty($expediente->conyrepleg_nombreconyusolicitan) ? "" :
$metodo->conversionNombre($expediente->conyrepleg_nombreconyusolicitan);
$conyugueRepresentanteLegalEstadoCivil=
ucwords(strtolower(preg_replace("/\([^)]+\)/","",$expediente->conyrepleg_estado_civil)));
$conyugueRepresentanteLegalNacionalidad= ucwords(strtolower($expediente->repLegalNacionalidad->nacionalidad));
$conyugueRepresentanteLegalFechaNacimiento=$metodo->imprimirFechaNacimiento($expediente->conyrepleg_fechacimie);
$conyugueRepresentanteLegaLugarNacimiento=ucwords(strtolower($expediente->conyrepleg_lugardenacimiento));
$conyugueRepresentanteLegalTelefono=$expediente->relegal_telefono_celular;
$conyugueRepresentanteLegalDomicilio= "Calle " . ucwords(strtolower( $expediente->conyrepleg_domicilioparticular))." ".
", ".
ucwords(strtolower($expediente->conyrepleg_colonia)).
", Codigo Postal ".$expediente->conyrepleg_codpos.", ".ucwords(strtolower($expediente->conyrepleg_municipio))."
Zacatecas";

$conyugueRepresentanteLegalCurp=$expediente->conyrepleg_curp;
$sexoConyugueRepresentanteLegal= substr($expediente->conyrepleg_curp,-8,1);




//Datos de garant Hipotecario
$garanteHipotecario=isset($expediente->garhipo_nombre_del_aval) ?
$metodo->conversionNombre($expediente->garhipo_nombre_del_aval) : "";
$estadoCivilGaranteHipotecario= ucwords(strtolower(preg_replace("/\([^)]+\)/","",$expediente->garhipo_estado_civil)));
$garanteHipotecarioLugarNacimiento=ucwords(strtolower($expediente->garhipo_lugar_de_nacimiento));
$garanteHipotecarioNacionalidad=! isset($expediente->garanteHipNacionalidad->nacionalidad) ? "" :
ucwords(strtolower($expediente->garanteHipNacionalidad->nacionalidad));
$garanteHipotecarioFechaNacimiento=$metodo->imprimirFechaNacimiento($expediente->garhipo_fecha_de_nacimiento);
$garanteHipotecarioLugarNacimiento=ucwords(strtolower($expediente->garhipo_lugar_de_nacimiento));
$garanteHipotecarioTelefono=$expediente->relegal_telefono_celular;

$garanteHipotecarioDomicilio= "Calle " . ucwords(strtolower( $expediente->garhipo_domicilio_particular))." Número ".
$expediente->garhipo_domicilio_numero.
", ".
ucwords(strtolower($expediente->garhipo_colonia)).
", Codigo Postal ".$expediente->garhipo_codigo_postal.", ".ucwords(strtolower($expediente->garantia_municipio))."
Zacatecas";

$garanteHipotecarioCurp=$expediente->garhipo_curp;









//Tipo de credito
$tipoDeCredito= $expediente->tipocredito." ".$expediente->productoCredito->producto;

$productoCredito= $expediente->productoCredito->producto;


$actividadNegocio=$metodo->nombreActividad($expediente->actividad_economica);//
ucwords(strtolower($expediente->actividad_economica));






//Destino Prestamo
$destinoPrestamo = ucwords(strtolower($expediente->destino));
//Descripcion Inmueble
$descripcionInmueble=ucwords(mb_strtolower($expediente->garantia_descrbien_inmueble))
." Ubicada en la Calle ".ucwords(strtolower($expediente->garantia_domici))." ".$expediente->garantia_dom_numero.
", ".ucwords(strtolower($expediente->garantia_colonia)).
", Codigo Postal ".ucwords(strtolower($expediente->garantia_cod_postal)).", ".
ucwords(strtolower($expediente->garantia_localidad)).", ".
ucwords(strtolower($expediente->garantia_municipio)).
", con una Superficie de ".$expediente->garantia_superf_terreno_mt." m²".
" con valor comercial de $".number_format(floatval($expediente->garantia_valor),2).",
Según el Avaluo Practicado por el ".ucwords(strtolower($expediente->garantia_perito_valuador))
. " de Fecha ".$metodo->imprimirFechaAvaluo($expediente->garantia_fecha_valuacion);

$descripcionInmueble =ucwords(mb_strtolower(mb_strtoupper($descripcionInmueble, 'UTF-8')));

$numeroDeComite= intval(preg_replace('/[^0-9]+/', '', $expediente->numcomite), 10);
$numeroDeComite= ucfirst(strtolower($numeroDeComite ));
$numeroComite =$expediente->numcomite;



$tipoReunion = strpos($numeroComite, "E") === false ? "Reunión Ordinaria del H. Comité Técnico" : "Reunión Extraodinaria
del H. Comité Técnico";


$fechaComite= $metodo->imprimirFechaNacimiento($expediente->fecha_reunion_comite);

$interesMoral= intval(preg_replace('/[^0-9]+/', '', $expediente->ProductoCredito->crefpmensualmora), 10);

$parteEnteraInteresMoral= intval( $interesMoral/10);

if($parteEnteraInteresMoral >=1 ){
$porcentajeInteresMoral = intval( $interesMoral/10) . ".". $interesMoral%10;
} else {
$porcentajeInteresMoral = $interesMoral %10;
}



$porcentajeInteresAnualMoral= intval(preg_replace('/[^0-9]+/', '', $expediente->ProductoCredito->crefpanualmora), 10);










//Nombre del conyugue del aval
$nombreConyugueAval= $metodo->conversionNombre($expediente->conav_nombconyugaval);
$estadoCivilConyugueAval =ucwords(strtolower(preg_replace("/\([^)]+\)/","",$expediente->conav_estcivilconaval)));
$fechaNacimientoConyugueAval =$metodo->imprimirFechaNacimiento($expediente->conav_fechnacconyaval);
$conyugueAvalLugarNacimiento=ucwords(mb_strtolower($expediente->conav_lugarnaconyuaval));
$curpConyugueAval= $expediente->conav_curpconaval;

$domicilioConyugueAval= "Calle " . ucwords(strtolower( $expediente->conyav_dompartconyuaval))." Número ".
$expediente->garhipo_domicilio_numero.
", ".
ucwords(strtolower($expediente->conav_colconyugueaval))
.", ".ucwords(strtolower($expediente->conav_municonyaval))." Zacatecas";

$nacionalidadConyugueAval=isset($expediente->conyAvalNacionalidad->nacionalidad) ?
ucwords(strtolower($expediente->conyAvalNacionalidad->nacionalidad)) : "";


$garanteHipotecarioCurp=$expediente->garhipo_curp;

$telefonoNegocio=$expediente->telnegocio;
$sexoGaranteHipotecario = substr($garanteHipotecarioCurp,-8,1);
$sexoConyugueAval= substr($curpConyugueAval,-8,1);



$idProductoCredito = $expediente->productoCredito->id_procredito;




@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            margin: 8mm;
        }

        body {
            font-family: "Arial", serif;
            font-size: 12px;
            margin: 8mm;
        }

        #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px; background-color: lightblue; }
       #footer .page:after { content: counter(page, upper-roman); }
    </style>
 <script type="text/php">
    if (isset($pdf)) {
        $x = 250;
        $y = 10;
        $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
        $font = null;
        $size = 14;
        $color = array(255,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
</script>


</head>



<body>


    <div id="footer">
        <p class="page">Page </p>
    </div>

    <p align="justify">
        <strong>CONTRATO PRIVADO de
            {{$expediente->tipocredito}}
            "{{{$expediente->productoCredito->producto}}}",</strong> que celebran por una parte el
        <strong>HSBC México, S.A.,
            Institución de Banca Múltiple,</strong> Grupo Financiero HSBC, División Fiduciaria (antes Banco
        Internacional S.A., Institución
        de Banca Múltiple, Grupo Financiero Bital, División Fiduciaria) como fiduciario en el Fideicomiso número 158127
        denominado <strong>"FONDO PLATA ZACATECAS"</strong> representado por su apoderado especial el <strong>L.C.
            Felipe Ignacio Ávalos
            Pérez</strong>, Administrador del Fondo (en lo sucesivo y para efectos del presente contrato se le
        denominara <strong>"EL FONDO"
        </strong> ) y por otra parte <strong>{{ $metodo->conversionNombre($expediente->nombre_solicitante)}}


            @if($expediente->conyrepleg_nombreconyusolicitan != "")
            y {{ $metodo->conversionNombre($expediente->conyrepleg_nombreconyusolicitan)}}</strong>
        (en lo sucesivo y para efectos del presente contrato a quien denominaremos <strong>"EL ACREDITADO"</strong>), al
        tenor de
        las siguientes Declaraciones y
        Cláusulas:

        @endif


        @if( $expediente->garhipo_nombre_del_aval != "" && $expediente->garhipo_nombre_del_aval !=
        $expediente->nombre_solicitante )
        </strong>(en lo sucesivo y para efectos del presente contrato a quien denominaremos <strong>"EL
            ACREDITADO"</strong>),

        y como <strong> AVAL Y DEUDOR SOLIDARIO {{ $metodo->conversionNombre($expediente->garhipo_nombre_del_aval)}}
            @endif


            @if($expediente->conav_nombconyugaval != "")
            y

            {{$metodo->conversionNombre($expediente->conav_nombconyugaval)}}

            al tenor de las siguientes Declaraciones y Cláusulas:

            @elseif($expediente->garhipo_nombre_del_aval != "" && $expediente->garhipo_nombre_del_aval ==
            $expediente->nombre_solicitante)
        </strong>
        y (en lo sucesivo y para efectos del presente contrato a quien denominaremos <strong>"EL ACREDITADO"</strong>),
        al tenor de
        las siguientes Declaraciones y
        Cláusulas:

        @endif
        </strong>


    </p>

    <p>
        <center><strong>DECLARACIONES</strong></center>
    </p>

    <p align="justify">
        I.- Declara <strong>EL FONDO</strong> por conducto de su Administrador:

    </p>
    <p align="justify">
        a).- Que es un Fideicomiso de inversión y administración creado por el Gobierno del Estado de Zacatecas y
        originalmente
        Administrado por BANCOMER S.A., como <strong>FIDUCIARIA</strong> de conformidad con el contrato de Fideicomiso
        de Inversión y
        Administración de fecha 16 (dieciséis) de Junio de 1999 (mil novecientos noventa y nueve), mismo que se
        protocolizó
        ante la fe del Notario Público Número 26 (veintiséis) Licenciado Enrique Varela Parga, mediante acta número 6028
        (seis
        mil veintiocho) de fecha 12 (doce) de agosto de 1999 (mil novecientos noventa y nueve) e inscrito en el Registro
        Público
        de la Propiedad y del Comercio, bajo el número 6 (seis), folios 20-32 (veinte guión treinta y dos), volumen 141
        (ciento
        cuarenta y uno) de comercio, de fecha diez (10) de septiembre de 1999 (mil novecientos noventa y nueve).
    </p>

    <p align="justify">
        b).-Mediante acta número 7050 (siete mil cincuenta) de fecha 4 (cuatro) de junio del 2001 (dos mil uno), del
        protocolo
        del Notario Público Número 26 (veintiséis) Licenciado Enrique Varela Parga, se celebró Convenio de Sustitución
        de
        Fiduciario y de Institución Bancaria, siendo ahora administrado por Banco Internacional S.A., Institución de
        Banca
        Múltiple, Grupo Financiero Bital, División Fiduciaria, cuyo primer testimonio se encuentra inscrito en el
        Registro Público
        de la Propiedad bajo el número 62 (sesenta y dos), folio 130-131 (ciento treinta guión ciento treinta y uno),
        del volumen
        151 (ciento cincuenta y uno), libro primero sección sexta de fecha 30 (treinta) de julio del 2001 (dos mil uno).
    </p>

    <p align="justify">
        c).-Por escritura número 287881 (doscientos ochenta y siete mil ochocientos ochenta y uno) volumen número 10634
        (diez mil seiscientos treinta y cuatro) de fecha 16 (dieciséis) de diciembre del 2003 (dos mil tres), ante la fe
        del Licenciado
        Tomas Lozano Molina, Notario Público número 10 (diez) del Distrito Federal, se protocolizó acta de Asamblea
        General
        Extraordinaria de Accionistas, la cual se encuentra pendiente de inscripción en el Registro Público de la
        Propiedad y folio
        mercantil 64053 (sesenta y cuatro mil cincuenta y tres, en la cual entre otros acuerdos se determinó cambiar la
        denominación de Banco Internacional S.A., Institución de Banca Múltiple, Grupo Financiero Bital por la de
        <strong>HSBC México
            S.A., Institución de Banca Múltiple, Grupo Financiero HSBC,</strong> reformando en este sentido sus
        estatutos.
    </p>


    <p align="justify">
        II.- El <strong>L.C. Felipe Ignacio Ávalos Pérez,</strong> Administrador del Fondo, que acredita su
        personalidad, como Apoderado de
        <strong>HSBC México S.A., Institución de Banca Múltiple, Grupo Financiero HSBC</strong> (antes Banco
        Internacional S.A.,
        Institución de Banca Múltiple, Grupo Financiero Bital), mediante Poder General Limitado Para Pleitos y Cobranzas
        y
        Actos de Administración, para suscribir los contratos de crédito del Fideicomiso Número <strong>158127
        </strong>(ciento cincuenta y ocho
        mil ciento veintisiete) denominado <strong>FONDO PLATA ZACATECAS</strong>, mediante acta número
        <strong>32,873</strong> (treinta y dos mil
        ochocientos setenta y tres) Libro <strong>949</strong> (novecientos cuarenta y nueve) de fecha
        <strong>13</strong> (trece) de Marzo de 2019 (dos mil
        diecinueve), del protocolo a cargo del <strong>Notario Público Número 223</strong> (doscientos veintitrés) de la
        Ciudad de México,
        Licenciada Rosamaría López Lugo, cuyo primer testimonio se encuentra inscrito en el Registro Público de la
        Propiedad
        y del Comercio de Zacatecas, bajo el número de inscripción <strong>0004</strong> (cuatro), del Volumen
        <strong>2372</strong> (dos mil trescientos setenta
        y dos), Libro Segundo, Sección Primera, de fecha <strong>21</strong> (veintiuno) de <strong>Marzo del
            2019</strong> (dos mil diecinueve).
    </p>

    <p align="justify">
        III.- Declara <strong>{{ $metodo->conversionNombre($expediente->nombre_solicitante)}}
            @if($expediente->conyrepleg_nombreconyusolicitan != "")
            y {{ $metodo->conversionNombre($expediente->conyrepleg_nombreconyusolicitan)}}
            @endif
        </strong>
        que ofrecen como garantía las propias del
        <strong>
            {{$expediente->tipocredito}}

            "{{{$expediente->productoCredito->producto}}}"</strong>.
    </p>

    <p align="justify">
        IV.- Declara <strong>EL FONDO</strong> que el Presidente Suplente del H. Comité Técnico, autorizó el
        otorgamiento del crédito solicitado
        por <strong>EL ACREDITADO,</strong> según facultades que le confirió el H. Comité Técnico en la
        <strong>{{ $metodo->numeroComiteEnletras($expediente->numcomite)}}
            REUNIÓN
            EXTRAORDINARIA, CELEBRADA EL DÍA
            {{ $metodo->fechaParaImprimirContrato($expediente->fecha_reunion_comite)}}</strong>, sujeto
        a que, previo a la formalización del presente contrato, <strong>EL ACREDITADO</strong> le manifestase por
        escrito que no tiene limitación
        contractual alguna para la celebración del presente contrato, ni para otorgar las garantías ofrecidas. Al efecto
        la Empresa
        dedicada a <strong>"{{$actividadNegocio}}" </strong> a nombre de
        <strong>{{ $metodo->conversionNombre($expediente->nombre_solicitante)}}
            @if($expediente->conyrepleg_nombreconyusolicitan != "")
            y {{ $metodo->conversionNombre($expediente->conyrepleg_nombreconyusolicitan)}}
            @endif
        </strong>
        ha cumplido con dicha condición, por lo que por parte de <strong>EL FONDO</strong> no existe inconveniente
        alguno para la celebración
        del presente contrato.
    </p>
    <p align="justify">
        V.-Declara
        <strong>{{ $metodo->conversionNombre($expediente->nombre_solicitante)}}
            @if($expediente->conyrepleg_nombreconyusolicitan != "")
            y {{ $metodo->conversionNombre($expediente->conyrepleg_nombreconyusolicitan)}}
            @endif
        </strong>
        estar conformes en comparecer en este
        contrato y estar conscientes de sus consecuencias y alcances legales.
    </p>

    <p align="justify">
        VI.-Sigue manifestando <strong>EL ACREDITADO</strong> que con objeto de incrementar sus operaciones ha
        solicitado y obtenido del
        <strong>FONDO PLATA ZACATECAS</strong> un
        <strong>
            {{$expediente->tipocredito}}



            "{{{$expediente->productoCredito->producto}}}"</strong>
        por la cantidad de <strong>${{number_format(floatval($expediente->monto),2)}}
            ({{$metodo->dineroEnLetras($expediente->monto)}}).</strong>


    </p>
    <p align="justify">
        Atento a lo expuesto, los comparecientes formalizan el presente contrato privado, conforme a las siguientes:
    </p>
    <h3>
        <center>CLAUSULAS</center>
    </h3>

    <p align="justify">
        <strong> PRIMERA.- TIPO E IMPORTE DEL CRÉDITO.- EL FONDO</strong> otorga a <strong> ACREDITADO</strong>, un
        <strong>
            {{$expediente->tipocredito}}

            "{{{$expediente->productoCredito->producto}}}"
        </strong>
        por la cantidad de <strong>${{number_format(floatval($expediente->monto),2)}}
            ({{$metodo->dineroEnLetras($expediente->monto)}}).</strong> Dentro del límite del Crédito no se incluyen las
        comisiones, intereses y gastos que deba cubrir <strong>EL ACREDITADO</strong> con motivo del presente contrato.
    </p>
    <p align="justify">
        <strong>SEGUNDA.- DESTINO.- EL ACREDITADO</strong> se obliga a invertir el importe de
        <strong>${{number_format(floatval($expediente->monto),2)}}
            ({{$metodo->dineroEnLetras($expediente->monto)}})</strong> valor del crédito señalado en la cláusula primera
        del presente contrato de
        conformidad con lo siguiente:
    </p>

    <table width="100%">
        <tr>
            <td><strong>Concepto</strong></td>
            <td>
                <strong> Cantidad</strong>

            </td>
            <td ALIGN="right">
                <strong>
                    Monto
                </strong>


            </td>
        </tr>
        <tr>
            <td>
                <strong>
                    {{$expediente->tipocredito}}
                    "{{{$expediente->productoCredito->producto}}}"
                </strong>
            </td>
            <td>

            </td>
            <td></td>
        </tr>

        <tr>
            <td>
                <strong>
                    {{ucwords(strtolower($expediente->destino))}}

                </strong>
            </td>

            <td>
            </td>
            <td align="right">
                <u>
                    ${{number_format(floatval($expediente->monto),2)}}
                </u>


            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <strong>
                    Total
                </strong>
            </td>
            <td align="right">
                ${{number_format(floatval($expediente->monto),2)}}</td>
        </tr>
    </table>
    <p align="justify">
        En el entendido de que en el monto mencionado, no se incluye el importe correspondiente al impuesto al valor
        agregado,
        el cual deberá ser cubierto por <strong>EL ACREDITADO,</strong> con recursos ajenos al crédito.
    </p>

    <p align="justify">
        <strong>TERCERA.- DISPOSICIÓN.- EL ACREDITADO</strong> dispondrá del crédito que se le otorga en un sólo acto,
        mediante la
        suscripción de un pagaré a la orden de <strong>EL FONDO.</strong>

    </p>
    <p align="justify">
        El pagaré de que se trata es del tipo causal, no modifica este contrato y solo señala los plazos dentro de los
        cuales
        deberá quedar <strong>reembolsado</strong> el crédito, así como la disposición del mismo, pero podrá ser
        descontado por <strong>EL FONDO</strong>
        en los términos del artículo 299 de la Ley General de Títulos y Operaciones de Crédito, para lo cual le faculta
        <strong>EL
            ACREDITADO</strong>.
    </p>
    <p align="justify">
        Las partes manifiestan que la forma de pago de la presente operación se concretará vía transferencia electrónica
        de
        fondos de la cuenta <strong>0155654203 </strong> <strong> y CLABE 012930001556542030</strong> del banco
        <strong>BBVA</strong> a nombre de la
        <strong>
            Secretaría de Economía (Fondo Plata Zacatecas)</strong> a la <strong> CUENTA {{$expediente->cuentabanco}} y
            CLABE {{$expediente->clavebanco}} de
            {{$expediente->banco->banco}}
            a nombre de
            {{ $metodo->conversionNombre($expediente->nombre_solicitante)}}
        </strong>


        sin que a la fecha se proporcionen los datos relativos al número de
        operación que ampara la citada transferencia.
    </p>
    <p align="justify">
        <strong>CUARTA.- INTERESES ORDINARIOS.- EL ACREDITADO</strong> pagara a EL FONDO, intereses sobre saldos
        insolutos a la
        TASA ANUAL FIJA del {{$expediente->productoCredito->crefpanual}}%
        ({{$metodo->soloNumeroAletras($expediente->productoCredito->crefpanual)}}
        PORCIENTO) pagaderos mensualmente los días últimos de cada mes. El primer
        pago deberá efectuarse el día último del mes, en el cual se otorgue el crédito.
    </p>

    <p align="justify">
        @if ($idProductoCredito ==5)

        Los primeros 4 meses a partir de la disposición del Crédito los Intereses Ordinarios serán a TASA 0%, a partir
        del mes
        5 y hasta el vencimiento total del Crédito causará un Interés Ordinario del 5% anual fijo, según se describe en
        la
        <strong>Cláusula Cuarta</strong> en el párrafo anterior.


        @endif

    </p>
    <p align="justify">
        El cálculo de los Intereses Ordinarios se efectuará utilizando el procedimiento de dias naturales transcurridos,
        con
        divisor 360 (trescientos sesenta) (base comercial)
    </p>


    <p align="justify">
        <strong>QUINTA.- INTERESES MORATORIOS.- </strong> el evento de que <strong>EL ACREDITADO</strong> incumpliera en
        el pago de las
        amortizaciones de capital, las sumas vencidas de capital causarán intereses moratorios del <strong>1.5% (UNO
            PUNTO
            CINCO PORCIENTO)</strong> mensual, computables desde las fechas del vencimiento de las obligaciones y hasta
        las de su
        liquidación.
    </p>




    <p align="justify">
        El cálculo de los Intereses Moratorios se efectuará utilizando el procedimiento de días naturales transcurridos,
        con
        divisor 360 (trescientos sesenta) (base comercial).
    </p>
    <p align="justify">
        <strong>COMISIÓN POR APERTURA DEL "CRÉDITO".- " EL ACREDITADO"</strong> pagará a <strong>"EL FONDO" </strong>
        única ocasión una
        comisión por apertura del <strong>0% (CERO PORCIENTO)</strong> sobre el importe total del crédito, comisión que
        deberá ser
        descontada a la firma del presente contrato y quedará dentro del propio financiamiento del crédito.
    </p>
    <p align="justify">
        <strong>SEXTA.- PLAZO.- EL ACREDITADO</strong> pagará a <strong>EL FONDO</strong> el

        <strong>
            {{$expediente->tipocredito}}

            "{{{$expediente->productoCredito->producto}}}",
        </strong>
        a un plazo total de
        <strong>
            {{$expediente->plazo}}
            ({{$metodo->soloNumeroAletras($expediente->plazo)}}) meses </strong> ,Incluyendo dentro del plazo un
        <strong>
            periodo de Gracia a Capital de 6 (SEIS) meses.

        </strong>
    </p>

    <p align="justify">
        <strong>SÉPTIMA.- PAGO DEL CREDITO.-</strong> El pago del crédito concedido será efectuado por <strong>EL
            ACREDITADO</strong> en el domicilio
        de <strong>EL FONDO</strong> mediante el número de amortizaciones mensuales y consecutivas, por las cantidades y
        en las fechas de
        vencimiento que se establecen en el pagaré a que se refiere la Cláusula de DISPOSICION precedente.
    </p>
    <p align="justify">
        El importe de dicho pagaré deberá ser pagado conforme a lo pactado en esta cláusula, no obstante que al citado
        pagaré
        se le ponga como fecha de vencimiento la misma del vencimiento de la vigencia del plazo de este contrato.
    </p>
    <p align="justify">
        En el calendario de amortizaciones de capital no se encuentran incluidos los intereses correspondientes, los
        cuales se
        pagarán en los términos de la cláusula cuarta del presente contrato.

    </p>
    <p align="justify">
        <strong>OCTAVA- APLICACIÓN DE PAGOS.-</strong> Queda expresamente estipulado que cualquier pago efectuado por
        <strong>EL
            ACREDITADO</strong> en abono a su crédito se aplicara precisamente en el siguiente orden: gastos diversos
        que hubiera
        erogado EL FONDO en favor de <strong>EL ACREDITADO,</strong> costas (en su caso), honorarios, intereses
        moratorios, intereses
        normales y finalmente capital
    </p>
    <p align="justify">
        <strong> NOVENA.- VENCIMIENTO EN DÍA INHÁBIL.-</strong> Cualquier pago a cargo de <strong> ACREDITADO,</strong>
        derivado de las
        obligaciones consignadas en éste contrato, lo efectuará <strong>EL ACREDITADO </strong> precisamente el día del
        vencimiento o bien
        el día hábil inmediato anterior si el día de vencimiento resulta inhábil.
    </p>
    <p align="justify">
        <strong> DECIMA.- PAGOS ANTICIPADOS.-</strong> En el evento de que <strong> ACREDITADO</strong> obtenga pagos
        anticipados de sus clientes,
        se obliga a destinar dichos importes a liquidar total o parcialmente los saldos a su cargo, del crédito a que se
        refiere este
        contrato, en caso de pagos parciales, las sumas recibidas se aplicarán a los últimos vencimientos cubriendo con
        estas
        amortizaciones completas.
    </p>
    <p align="justify">
        <strong>DÉCIMA PRIMERA.- DOCUMENTACIÓN.- EL ACREDITADO </strong> emitirá en favor de <strong>EL FONDO</strong>,
        un pagaré conforme a la
        disposición del
        <strong>
            {{$expediente->tipocredito}}

            "{{{$expediente->productoCredito->producto}}}",
        </strong>
        que respalde el importe total del crédito, con los montos y vencimientos
        de acuerdo con lo estipulado en la cláusula séptima del presente contrato.
    </p>

    <p align="justify">
        <strong>DECIMA SEGUNDA.- GARANTÍAS.- {{$nombre_solicitante}}</strong> garantiza a EL FONDO el cumplimiento de
        las
        obligaciones que asumen en este contrato con las propias del Crédito Simple "Plan E-125"
    </p>

    <p align="justify">
        <strong>EL ACREDITADO</strong> expresamente a <strong>EL FONDO</strong> a endosar o descontar el pagaré que
        emita conforme a esta
        cláusula, así como a utilizarlo como cobertura de cualquier emisión de títulos en serie o certificados de
        participación que <strong>EL FONDO</strong>
        llegue a
        hacer por declaración unilateral de su voluntad.
    </p>

    <p align="justify">
        <strong>DÉCIMA SEGUNDA.- GARANTÍAS.-
            {{ $metodo->conversionNombre($expediente->nombre_solicitante)}}
            @if($expediente->conyrepleg_nombreconyusolicitan != "")
            y {{ $metodo->conversionNombre($expediente->conyrepleg_nombreconyusolicitan)}}
            @endif</strong>
        garantiza a <strong>
            EL FONDO</strong> el cumplimiento de las obligaciones que asumen en este contrato con las propias del
        <strong>
            {{$expediente->tipocredito}}
            "{{{$expediente->productoCredito->producto}}}".</strong>
    </p>

    <p align="justify">
        <strong>DÉCIMA TERCERA.- DEPOSITARIO.-</strong> Los bienes dados en garantía quedan en poder de <strong>EL
            ACREDITADO</strong>,
        quien se
        considerará depositario judicial solidario para los fines de la responsabilidad civil y penal en los términos
        del artículo 329
        (trescientos veintinueve) de la Ley General de Títulos y Operaciones de Crédito. Manifestando
        <strong>
            {{ $metodo->conversionNombre($expediente->nombre_solicitante)}}
            @if($expediente->conyrepleg_nombreconyusolicitan != "")
            y {{ $metodo->conversionNombre($expediente->conyrepleg_nombreconyusolicitan)}}
            @endif</strong>

        que se dan por recibido de los bienes y protestan el fiel y legal desempeño de su
        cargo, quedando depositados los bienes que constituyen la garantía específica y los que forman la empresa en el
        domicilio donde se encuentra ubicada, en<strong>
            {{ucwords(strtolower($expediente->negocio_domicilio))}} {{$expediente->negocio_dom_numero}},
            {{ucwords(strtolower($expediente->negocio_colonia))}},
            {{ucwords(strtolower($expediente->localidadzac))}},{{ucwords(strtolower($expediente->municipio->municipio))}},</strong>
        obligándose a mantenerlos a disposición irrestricta de <strong>EL FONDO</strong>. Al efecto, hace renuncia
        expresa a cualquier
        remuneración que por el desempeño del cargo le pudiera corresponder.
    </p>

    <!--PRINCIPIO IF AVAL-->
    <!--PRINCIPIO IF AVAL-->
    <!--PRINCIPIO IF AVAL-->
    <!--PRINCIPIO IF AVAL-->
    @if( $expediente->garhipo_nombre_del_aval != "" && $expediente->garhipo_nombre_del_aval !=
    $expediente->nombre_solicitante )
    <!--se tiene aval-->
    <!--se tiene aval-->
    <!--se tiene aval-->


    <p>
        <strong>DÉCIMA CUARTA.- AVAL Y DEUDOR SOLIDARIO.-
            {{ $metodo->conversionNombre($expediente->garhipo_nombre_del_aval)}}

            @if($expediente->conav_nombconyugaval != "")
            y
            {{$metodo->conversionNombre($expediente->conav_nombconyugaval)}} </strong>
        @endif

        por sus propios derechos manifiestan su conformidad en asumir la calidad de <strong> AVAL Y
            DEUDOR SOLIDARIO </strong> de las obligaciones contraídas por <strong> EL ACREDITADO, </strong> en el
        presente instrumento, por
        lo que igualmente suscribirán en unión de <strong> EL ACREDITADO </strong> la documentación a que se refiere la
        cláusula
        décima primera del presente contrato.
    </p>

    <p align="justify">
        <strong>DÉCIMA QUINTA.- SEGUROS.- EL ACREDITADO</strong> se obliga a asegurar, los bienes objeto de este
        financiamiento, por
        su valor, en tránsito y desde su arribo a la planta, solo cuando el H. Comité Técnico así lo condicione.
    </p>

    <p align="justify">
        <strong>DÉCIMA SEXTA.- PERITO VALUADOR.-</strong> En el caso de que requiera, ya sea en forma judicial o
        extrajudicial, la
        participación de un perito valuador para cuantificar el valor de los bienes que integran o llegaran a integrar
        las garantías
        relativas a este crédito las partes acuerdan que <strong>EL FONDO</strong> sea quien designa los peritos
        valuadores.
    </p>
    <p align="justify">
        <strong>DÉCIMA SÉPTIMA.- GASTOS.-</strong>Serán por cuenta de <strong>EL ACREDITADO</strong> todos gastos
        justificados en caso que
        <strong>EL FONDO</strong>
        erogue en el trámite y operación del crédito que por este acto se le concede. <strong>EL ACREDITADO</strong>
        reintegrará a <strong>EL FONDO</strong>,
        dentro de un plazo de 10 (diez) días a partir de su aviso, las sumas erogadas, mismas que no causarán intereses
        si el
        pago se efectúa oportunamente.
    </p>

    <p align="justify">
        <strong>DÉCIMA OCTAVA.-VIGILANCIA.-</strong> En los términos del artículo 327 (trescientos veintisiete) de la
        Ley General de Títulos
        y Operaciones de Crédito, <strong>EL FONDO</strong> vigilará, en todo tiempo que el importe del crédito se
        invierta precisamente en el
        objeto del contrato y designará, en su caso, un interventor para cuidar el exacto cumplimiento de las
        obligaciones de <strong>EL
            ACREDITADO.</strong> En consecuencia, <strong>EL ACREDITADO</strong> estará obligado a dar al interventor
        las facilidades necesarias para
        realizar dicha actividad.
    </p>

    <p align="justify">
        <strong>DECIMA NOVENA.- LUGAR DE PAGO.-</strong> Todos los pagos que <strong>EL ACREDITADO</strong> deba hacer a
        <strong>EL FONDO</strong> derivados
        del presente contrato, los efectuará en la Institución Bancaria, en el domicilio que <strong>EL FONDO</strong>
        indique por escrito a<strong> EL
            ACREDITADO,</strong> o bien en su domicilio, sito en <strong>Boulevard José López Portillo Número 220-9,
            Colonia Las Colinas,
            Código Postal 98098, Zacatecas, Zac.</strong>
    </p>

    <p align="justify">
        <strong>VIGÉSIMA. - SISTEMAS DE ORGANIZACIÓN Y CONTABILIDAD.-</strong> Mientras esté insoluto en todo o en parte
        el crédito que por el presente contrato se le concede, <strong>EL ACREDITADO</strong> se obliga a mantener los
        sistemas de
        organización y contabilidad general, necesarios y adecuados, a juicio de <strong>EL FONDO,</strong> que permitan
        una administración
        eficiente y el registro completo, correcto y oportuno de todas las operaciones de su empresa.
    </p>
    <p align="justify">
        <strong>EL ACREDITADO</strong> se obliga a entregar a <strong>EL FONDO,</strong> trimestralmente los estados
        financieros. Los representantes de <strong>
            EL
            FONDO,</strong> tendrán la facultad de inspeccionar los libros, registros e instalaciones y operación en
        general de <strong>EL
            ACREDITADO.</strong>
    </p>

    <p align="justify">
        <strong>VIGÉSIMA PRIMERA.- AVISOS DE MODIFICACIONES.- EL ACREDITADO</strong> se obliga a informar a <strong> EL
            FONDO, </strong> toda modificación
        hecha a su escritura social, todo cambio de representantes de <strong>EL ACREDITADO</strong> frente a <strong>
            EL FONDO </strong> y cualquier
        modificación de las facultades de que estén investidos los propios representantes, así como cualquier otro
        cambio en su
        estructura y operación que pueda afectar substancialmente la buena marcha de su empresa. Estas comunicaciones
        deberán acompañarse con los documentos justificativos correspondientes y deberán hacerse dentro del término de 2
        (dos) meses, contados a partir de la fecha en que se hayan acordado las modificaciones o cambios de que se
        trate.
    </p>

    <p align="justify">
        <strong>VIGÉSIMA SEGUNDA.- CONDICIONES ESPECIALES.-</strong>El otorgamiento del presente Crédito esta
        condicionado a lo
        siguiente:
    </p>


    @else
    <!--No tiene aval-->
    <!--No tiene aval-->
    <!--No tiene aval-->

    <p align="justify">
        <strong>DÉCIMA CUARTA.- SEGUROS.- EL ACREDITADO</strong> se obliga a asegurar, los bienes objeto de este
        financiamiento, por
        su valor, en tránsito y desde su arribo a la planta, solo cuando el H. Comité Técnico así lo condicione.
    </p>

    <p align="justify">
        <strong>DÉCIMA QUINTA.- PERITO VALUADOR.-</strong> En el caso de que requiera, ya sea en forma judicial o
        extrajudicial, la
        participación de un perito valuador para cuantificar el valor de los bienes que integran o llegaran a integrar
        las garantías
        relativas a este crédito las partes acuerdan que <strong>EL FONDO</strong> sea quien designa los peritos
        valuadores.
    </p>
    <p align="justify">
        <strong>DÉCIMA SEXTA.- GASTOS.-</strong>Serán por cuenta de <strong>EL ACREDITADO</strong> todos gastos
        justificados en caso que
        <strong>EL FONDO</strong>
        erogue en el trámite y operación del crédito que por este acto se le concede. <strong>EL ACREDITADO</strong>
        reintegrará a <strong>EL FONDO</strong>,
        dentro de un plazo de 10 (diez) días a partir de su aviso, las sumas erogadas, mismas que no causarán intereses
        si el
        pago se efectúa oportunamente.
    </p>

    <p align="justify">
        <strong>DÉCIMA SEPTIMA.-VIGILANCIA.-</strong> En los términos del artículo 327 (trescientos veintisiete) de la
        Ley General de Títulos
        y Operaciones de Crédito, <strong>EL FONDO</strong> vigilará, en todo tiempo que el importe del crédito se
        invierta precisamente en el
        objeto del contrato y designará, en su caso, un interventor para cuidar el exacto cumplimiento de las
        obligaciones de <strong>EL
            ACREDITADO.</strong> En consecuencia, <strong>EL ACREDITADO</strong> estará obligado a dar al interventor
        las facilidades necesarias para
        realizar dicha actividad.
    </p>

    <p align="justify">
        <strong>DECIMA OCTAVA.- LUGAR DE PAGO.-</strong> Todos los pagos que <strong>EL ACREDITADO</strong> deba hacer a
        <strong>EL FONDO</strong> derivados
        del presente contrato, los efectuará en la Institución Bancaria, en el domicilio que <strong>EL FONDO</strong>
        indique por escrito a<strong> EL
            ACREDITADO,</strong> o bien en su domicilio, sito en <strong>Boulevard José López Portillo Número 220-9,
            Colonia Las Colinas,
            Código Postal 98098, Zacatecas, Zac.</strong>
    </p>

    <p align="justify">
        <strong>DECIMA NOVENA. - SISTEMAS DE ORGANIZACIÓN Y CONTABILIDAD.-</strong> Mientras esté insoluto en todo o en
        parte
        el crédito que por el presente contrato se le concede, <strong>EL ACREDITADO</strong> se obliga a mantener los
        sistemas de
        organización y contabilidad general, necesarios y adecuados, a juicio de <strong>EL FONDO,</strong> que permitan
        una administración
        eficiente y el registro completo, correcto y oportuno de todas las operaciones de su empresa.
    </p>
    <p align="justify">
        <strong>EL ACREDITADO</strong> se obliga a entregar a <strong>EL FONDO,</strong> trimestralmente los estados
        financieros. Los representantes de <strong>
            EL
            FONDO,</strong> tendrán la facultad de inspeccionar los libros, registros e instalaciones y operación en
        general de <strong>EL
            ACREDITADO.</strong>
    </p>

    <p align="justify">
        <strong>VIGÉSIMA.- AVISOS DE MODIFICACIONES.- EL ACREDITADO</strong> se obliga a informar a <strong> EL FONDO,
        </strong> toda modificación
        hecha a su escritura social, todo cambio de representantes de <strong>EL ACREDITADO</strong> frente a <strong>
            EL FONDO </strong> y cualquier
        modificación de las facultades de que estén investidos los propios representantes, así como cualquier otro
        cambio en su
        estructura y operación que pueda afectar substancialmente la buena marcha de su empresa. Estas comunicaciones
        deberán acompañarse con los documentos justificativos correspondientes y deberán hacerse dentro del término de 2
        (dos) meses, contados a partir de la fecha en que se hayan acordado las modificaciones o cambios de que se
        trate.
    </p>

    <p align="justify">
        <strong>VIGÉSIMA PRIMERA.- CONDICIONES ESPECIALES.-</strong>El otorgamiento del presente Crédito esta
        condicionado a lo
        siguiente:
    </p>


    @endif

    <!--Fin de IF DE LAS CLAUSULAS SE TIENE O NO AVALES-->



    <p align="justify">
        <strong>I.- PREVIAS A LA FORMALIZACIÓN:</strong>
    </p>

    <p align="justify">
        1.- Que <strong>EL ACREDITADO</strong> presente comunicación escrita en la que establezca que no tiene
        limitación contractual alguna
        para contraer el presente financiamiento y otorgar las Garantías solicitadas.
    </p>

    <p>
        2.- Que
        <strong>
            {{ $metodo->conversionNombre($expediente->nombre_solicitante)}}
            @if($expediente->conyrepleg_nombreconyusolicitan != "")
            y {{ $metodo->conversionNombre($expediente->conyrepleg_nombreconyusolicitan)}}
            @endif</strong>
        comparece(n) por sus propios derechos a la
        suscripción del Contrato que regulará esta operación, para aceptar la designación de depositario de la GarantÍa
        que
        ampara este Financiamiento.
    </p>

    <p align="justify">
        <strong> II.- PREVIAS A LA DISPOSICIÓN:</strong>
    </p>


    <p align="justify">
        1.- Que <strong>EL ACREDITADO</strong> presente comunicación escrita en la que establezca que no tiene
        limitación contractual alguna
        para contraer el presente financiamiento y otorgar las Garantías solicitadas.
    </p>

    <p align="justify">
        2.- Los gastos, serán por cuenta de <strong>EL ACREDITADO</strong>. Todos los gastos justificados que <strong>EL
            FONDO</strong> erogue en el trámite
        y operación del crédito que por este acto se le concede.
    </p>

    <p align="justify">
        3.- En los términos del artículo 327 (trescientos veintisiete) de la Ley General de Títulos y Operaciones de
        Crédito, <strong>EL
            FONDO </strong> vigilará en todo tiempo, que el importe del crédito se invierta precisamente en el objeto
        del contrato y designará,
        en su caso, un interventor para cuidar el exacto cumplimiento de las obligaciones de <strong> El
            ACREDITADO.</strong>
    </p>

    <p align="justify">
        <strong>III.- DE NO HACER DURANTE LA VIGENCIA DEL CRÉDITO.</strong>
    </p>

    <p>
        1.- Que <strong> EL ACREDITADO </strong> se obligue a no contratar nuevos pasivos bancarios a un plazo mayor de
        un año y a no
        celebrar contratos de arrendamiento financiero durante la vigencia del presente crédito a menos que cuente con
        la previa
        autorización de EL FONDO otorgada por escrito.
    </p>

    <p align="justify">
        2.- Que <strong> EL ACREDITADO </strong> se comprometa a no efectuar inversiones adicionales en activos fijos, a
        menos que demuestre
        a satisfacción de <strong> EL FONDO </strong> que cuenta con los recursos necesarios para llevarlos a cabo.
    </p>

    <p align="justify">
        3.- Mantener la capitalización de las utilidades durante la vigencia del crédito.
    </p>
    <p>
        4.- <strong> EL ACREDITADO </strong> se compromete a mantener durante los años de vigencia del crédito índices
        financieros estables.
    </p>

    <p align="justify">
        5.- Que <strong> EL ACREDITADO </strong> presente comprobantes de inversión por la cantidad de

        <strong>${{number_format(floatval($expediente->monto),2)}}
            ({{$metodo->dineroEnLetras($expediente->monto)}}).</strong>

        Sin incluir el pago respectivo del impuesto al valor agregado que hubiera efectuado por la misma.
    </p>

    <p align="justify">
        <strong>
            IV.- EL FONDO PODRÁ DAR POR VENCIDO ANTICIPADAMENTE ESTE FINANCIAMIENTO EN LOS SIGUIENTES
            CASOS:</strong>
    </p>

    <p align="justify">
        1.- Si <strong> EL ACREDITADO </strong> dejara de efectuar cualquier amortización de principal o intereses a su
        vencimiento o cumplir
        puntualmente cualquiera de las otras obligaciones a su cargo que se deriven de este financiamiento.
    </p>
    <p align="justify">
        2.- Si los bienes dados en garantía fueren embargados en virtud de un juicio promovido por los trabajadores, por
        particulares, o por las autoridades fiscales.
    </p>

    <p align="justify">
        3.- Si los bienes dados en garantía bajaren su valor en un 20% o más y <strong> EL ACREDITADO </strong> no
        restableciera la proporción
        entre los bienes dados en garantía y el saldo insoluto del crédito. A este efecto <strong> EL ACREDITADO
        </strong> se obliga a mantener
        las reservas de depreciación y mantenimiento que se consideren necesarias y suficientes a fin de que ésta
        relación
        quede establecida.
    </p>

    <p align="justify">
        4.- Si cambia substancialmente el cuadro accionario o administrativo de <strong> EL ACREDITADO.</strong>
    </p>
    <p align="justify">
        5.- Para cualquier modificación al proyecto de inversión cuente con aprobación por escrito de <strong> EL FONDO.
        </strong>
    </p>

    <p align="justify">
        <strong><u> VIGÉSIMA SEGUNDA.- CAUSAS DE VENCIMIENTO ANTICIPADO.- </u> EL FONDO </strong> podrá disolver el
        presente contrato
        sin responsabilidad y exigir de <strong> EL ACREDITADO </strong> el pago anticipado de todas las sumas que ésta
        le adeudare a la fecha
        de la resolución, en los siguientes casos:
    </p>

    <p align="justify">
        a) Si <strong> EL ACREDITADO </strong> dejara de cumplir cualquiera de las obligaciones a su cargo consignadas
        en este contrato.
    </p>

    <p align="justify">
        b) Si los bienes dados en garantía a <strong>EL FONDO</strong> fueron embargados.
    </p>

    <p align="justify">
        c) Si <strong> EL ACREDITADO </strong> constituyera nuevo gravamen real sobre los bienes dados en garantía, sin
        el consentimiento
        previo dado por escrito, de <strong> EL FONDO.</strong>
    </p>

    <p align="justify">
        d) Si <strong> EL ACREDITADO </strong> diera su empresa en comodato, arrendamiento, o administración.
    </p>

    <p align="justify">
        e) Si <strong> EL ACREDITADO </strong> no comprobase la inversión en los términos senalados en el presente
        contrato.
    </p>

    <p align="justify">

        f) En los demás casos en que, conforme a la ley, sea exigible anticipadamente el cumplimiento de las
        obligaciones a
        plazo.
    </p>

    <p align="justify">
        <strong> <u> VIGÉSIMA TERCERA.- CONDICIONES SUSPENSIVAS.-</u> </strong> Para disponer del crédito que por el
        presente se le otorga, El
        ACREDITADO deberá entregar, a EL FONDO:
    </p>

    <p align="justify">
        a) Un ejemplar del presente contrato ratificado.
    </p>

    <p align="justify">
        <strong><u>VIGÉSIMA CUARTA.- RETROACTIVIDAD.-</u></strong> Los derechos y obligaciones emanados de este
        contrato, tienen efectos
        retroactivos a la fecha en que se haya efectuado la primera disposición del crédito, o bien, a partir de la
        fecha en que
        empiece a generarse la comisión de compromiso, lo que haya ocurrido primero.
    </p>

    <p align="justify">
        <strong><u> VIGÉSIMA QUINTA.- OBLIGACIONES CON <strong> EL FONDO</strong>.-</u></strong> A partir de la fecha en
        la que
        <strong> EL FONDO </strong> otorgue el crédito,
        <strong> EL ACREDITADO </strong> se obliga a:
    </p>

    <p align="justify">
        I.- Proporcionar a <strong> EL FONDO </strong> toda la información que le soliciten.
    </p>

    <p align="justify">
        II.- Permitir que el personal de <strong> EL FONDO, </strong> realice todas las visitas de supervisión que éste
        considere
        necesarias con el
        fin de corroborar la correcta aplicación de los recursos del financiamiento y la veracidad de la información que
        <strong> EL ACREDITADO </strong> proporcione.
    </p>


    <p align="justify">
        Para los efectos de los párrafos anteriores, las partes convienen en lo siguiente:
    </p>

    <p align="justify">
        a) Se considerará desvío de recursos cuando los fondos recibidos por <strong> EL ACREDITADO </strong> sean
        aplicados a un fin distinto
        del convenido en el presente contrato.
    </p>

    <p align="justify">
        b) Se considerará falsedad de información cuando <strong> EL ACREDITADO </strong> proporcione en cualquier
        tiempo, a <strong> EL FONDO </strong>
        documentación cuantitativa o cualitativa que resulte apócrifa, incompleta y/o alterada.
    </p>

    <p align="justify">
        c) Se considerará incumplimiento de condiciones cuando <strong> EL ACREDITADO </strong> deje de cumplir con
        cualquier requisito
        establecido por <strong> EL FONDO, </strong> para autorizar el descuento de este financiamiento.
    </p>

    <p align="justify">
        III.- Tener a disposición de <strong> EL FONDO </strong> los comprobantes originales de las inversiones que haya
        realizado con elpresente
        financiamiento,
        a más tardar en un plazo de 45 (cuarenta y cinco) días contados a partir de la fecha de
        disposición de los recursos,<strong> EL FONDO </strong> podrá requerir a <strong> EL ACREDITADO </strong> la
        comprobación de que se trata, en
        cualquier momento dentro de la vigencia del crédito.
    </p>

    <p align="justify">
        IV.- Permitir que <strong> EL FONDO </strong> lleve a cabo la visita de seguimiento del financiamiento y a
        proporcionarle toda la información
        que le solicite, aún en el caso de que decida pagar anticipadamente el crédito recibido.
    </p>

    <p align="justify">
        <strong><u> VIGÉSIMA SEXTA.- GASTOS DE FORMALIZACIÓN.- </u></strong> Los honorarios, derechos y gastos que se
        ocasionen por virtud
        de este contrato, de su ratificación, del testimonio para <strong> EL FONDO </strong> y su inscripción en los
        registros públicos que proceda,
        serán a cargo de <strong> EL ACREDITADO. </strong>

    </p>

    <p align="justify">
        Los honorarios, derechos y gastos de cancelación serán a cargo de <strong>EL ACREDITADO.</strong>
    </p>

    <p align="justify">
        <strong> <u> VIGÉSIMA SEPTIMA.- DOMICILIO CONVENCIONAL.</u></strong> Todas las notificaciones, avisos y en
        general cualquier
        comunicación que las partes deban hacerse en el cumplimiento de este contrato, incluyendo el emplazamiento en
        caso
        de juicio, se harán en los siguientes domicilios
    </p>

    <p align="justify">
        De <strong> EL FONDO </strong> en <strong> Boulevard José López Portillo Número 220 interior 9, Colonia Las
            Colinas, Código Postal 98098,
            Zacatecas, Zac.</strong>
    </p>

    <p align="justify">
        De <strong> EL ACREDITADO </strong>
        <strong>
            {{ $metodo->conversionNombre($expediente->nombre_solicitante)}}
            @if($expediente->conyrepleg_nombreconyusolicitan != "")
            y {{ $metodo->conversionNombre($expediente->conyrepleg_nombreconyusolicitan)}}
            @endif</strong> en <strong> Calle {{ucwords(strtolower($expediente->genesol_domicilio_particular))}} Número
            {{$expediente->genesol_domicilio_numero}},
            {{ucwords(strtolower($expediente->genesol_colonia))}},Código Postal {{$expediente->genesol_codigo_postal}},
            {{ucwords(strtolower($expediente->genesol_municipio))}}, Zacatecas </strong> y
        <strong>
            {{ucwords(strtolower($expediente->negocio_domicilio))}} Número
            {{$expediente->negocio_dom_numero}}, {{ucwords(strtolower($expediente->negocio_colonia))}},
            Código Postal {{$expediente->negocio_codigo_postal}},
            {{ucwords(strtolower($expediente->localidadzac))}},{{ucwords(strtolower($expediente->municipio->municipio))}},
            Zacatecas</strong>.
    </p>

    <p align="justify">
        Cualquier cambio de domicilio de las partes, deberá ser notificado por escrito dirigido a la otra parte, con
        acuse de recibo.
        Sin este aviso, todas las comunicaciones se entenderán válidamente hechas, a los domicilios aquí señalados.
    </p>

    <p align="justify">
        <strong><u>VIGÉSIMA OCTAVA.- MODIFICACIONES CONTRACTUALES. </u></strong> Cualquier modificación al clausulado de
        este contrato,
        concesión de prórroga, quita o espera deberá constar por escrito precisamente, y cualquier acuerdo verbal no
        tendrá
        validez alguna.
    </p>

    <p align="justify">
        <strong><u>TRIGESIMA.- COMPETENCIA JURISDICCIONAL.</u></strong> Para cualquier controversia que se suscite con
        motivo de la
        interpretación del presente contrato y para ser compelidas a su cumplimiento, las partes se someten expresamente
        a la
        jurisdicción de los tribunales competentes de la Ciudad de Zacatecas, Zac. En caso de que proceda a ejercitar
        las
        acciones correspondientes y hacer efectivas las garantías reales constituidas en el presente contrato privado.
    </p>

    <p align="justify">
        <strong><u> TRIGÉSIMA PRIMERA.- VIGENCIA DE LA OFERTA.</u> </strong> La oferta de Crédito que en el presente se
        estipula, estará vigente
        durante un plazo de dos meses contados a partir de la fecha en que se le comuniquen a <strong>EL ACREDITADO
        </strong> las
        condiciones de las operaciones.<br>
    </p>
    <p align="justify">
        Dentro del plazo estipulado <strong> EL ACREDITADO </strong> debera cumplir con los requisitos expuestos y las
        operaciones deberán
        quedar debidamente formalizadas. En caso contrario automáticamente se cancelará el compromiso de nuestra
        Institucion
        para otorgar el financiamiento. Dicho plazo podrá ampliarse por un período igual, siempre que a juicio de la
        institucion
        se justifique.
    </p>
    <p>
        <center>GENERALES</center>
    </p>

    <p align="justify">
        El <strong>L.C Felipe Ignacio Ávalos Pérez,</strong> manifiesta por sus generales ser de nacionalidad mexicana,
        mayor de edad,
        casado, Funcionario Publico, originario de Juan Aldama, Zacatecas, y vecino de esta Ciudad Capital de Zacatecas,
        con
        domicilio oficial Boulevard José Lopéz Portillo No. 220-9, Colonia Las Colinas, Zacatecas,Zac. C.P 98098,
        Zacatecas,Zac, nacio el día treinta y uno de julio de mil novecientos sesenta y dos, se encuentra al corriente
        en el pago
        del Impuesto sobre la Renta con Cédula del Registro Federal de Contribuyentes número <strong> AAPF620731KL5 y
            CURP
            AAPF620731HZSVRL06.</strong>
    </p>

    <p align="justify">
        <strong> {{ $metodo->conversionNombre($expediente->nombre_solicitante)}},</strong> de nacionalidad
        <strong>{{$expediente->solicitanteNacionalidad->nacionalidad}} </strong>
        por nacimiento, mayor de edad, estado civil

        <strong>{{ucwords(strtolower($estadoCivilSolicitante))}},</strong>

        dedicado(a)
        al

        <strong>"{{$actividadNegocio}}",</strong> originario(a) de


        <strong>{{$expediente->genesol_muni_naci}},
            {{$expediente->genesol_lugar_de_nacimiento}}, </strong>
        en donde nacio
        el
        <strong>
            {{ $metodo->imprimirFechaNacimiento($expediente->genesol_fecha_de_nacimiento)}},</strong>
        con domicilio particular
        en <strong>
            Calle {{ucwords(strtolower($expediente->genesol_domicilio_particular))}} Número
            {{$expediente->genesol_domicilio_numero}},

            {{ucwords(strtolower($expediente->genesol_colonia))}},Código Postal {{$expediente->genesol_codigo_postal}},
            {{ucwords(strtolower($expediente->genesol_municipio))}}, Zacatecas</strong>

        , con cédula de registro federal de contribuyentes
        <strong>
            {{$expediente->genesol_rfc}} </strong> y
        CURP <strong> {{$expediente->genesol_curp}}.</strong>
    </p>

    <!--Conyugue del solicitante-->



    @if($expediente->conyrepleg_nombreconyusolicitan != "")

    <p align="justify">
        <strong> {{ $metodo->conversionNombre($expediente->conyrepleg_nombreconyusolicitan)}},</strong> de nacionalidad
        <strong>{{$expediente->repLegalNacionalidad->nacionalidad}} </strong>
        por nacimiento, mayor de edad, estado civil

        <strong>{{ucwords(strtolower($estadoCivilSolicitante))}},</strong>
        originario(a) de
        <strong>{{$expediente->conyrepleg_municipionacimiento}},
            {{ucwords(mb_strtolower($expediente->conyrepleg_lugardenacimiento))}}, </strong>
        en donde nacio
        el
        <strong>
            {{ $metodo->imprimirFechaNacimiento($expediente->conyrepleg_fechacimie)}},</strong>
        con domicilio particular
        en <strong>
            Calle {{ucwords(strtolower($expediente->conyrepleg_domicilioparticular))}} Número
            {{$expediente->genesol_domicilio_numero}},

            {{ucwords(strtolower($expediente->conyrepleg_colonia))}},Código Postal {{$expediente->conyrepleg_codpos}},
            {{ucwords(strtolower($expediente->conyrepleg_municipio))}}, Zacatecas</strong>

        , con cédula de registro federal de contribuyentes
        <strong>
            {{$expediente->conyrepleg_rfc}} </strong> y
        CURP <strong> {{$expediente->conyrepleg_curp}}.</strong>
    </p>


    @endif



    <p align="justify">
        Leido el presente Instrumento ante los otorgantes, lo ratificaron y firmaron en la Ciudad de Zacatecas, Zac., a
        los
        <strong>
            {{$metodo->imprimirFechaFirmaContrato()}}</strong>

    </p>
    <p align="justify">
        <strong> DAMOS FE.</strong>
    </p>



    <p align="center">
        <strong>
            HSBC MEXICO S.A., INSTITUCIÓN DE BANCA MÚLTIPLE, GRUPO FINANCIERO HSBC,<br>
            DIVISION FIDUCIARIA (ANTES BANCO INTERNACIONAL S.A.,<br>
            INSTITUCIÓN DE BANCA MÚLTIPLE, GRUPO FINANCIERO BITAL, DIVISION FIDUCIARIA)<br>
            COMO FIDUCIARIO EN EL FIDEICOMISO NÚMERO 158127 DENOMINADO <br>
            FONDO PLATA ZACATECAS.</strong>
    </p>

    <p align="center"><br><br>
        <strong>
            L.C. Felipe Ignacio Ávalos Pérez<br>
            Administrador de Fondo Plata Zacatecas</strong>
        <br><br><br>
    </p>

    <p align="center">
        <strong>
            EL ACREDITADO(S)</strong><br><br> <br>

        {{$nombre_solicitante}}
    </p>











</body>

</html>