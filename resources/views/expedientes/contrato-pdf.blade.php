@inject('metodo','App\Http\Controllers\ExpedienteController')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        p {
            font-family: Arial;
            font-size: 12pt;
        }

        html {
            margin: 50pt 50pt;
        }
    </style>
</head>

<body>
    <p align="justify">
        <strong>CONTRATO PRIVADO de
            @if($expediente->tipocredito=="CRÉDITO SIMPLE")
            Crédito Simple
            @else
            Cuenta Corriente
            @endif
            "{{{$expediente->productoCredito->producto}}}",</strong> que celebran por una parte el
        <strong>HSBC México, S.A.,
            Institución de Banca Múltiple,</strong> Grupo Financiero HSBC, División Fiduciaria (antes Banco Internacional S.A., Institución
        de Banca Múltiple, Grupo Financiero Bital, División Fiduciaria) como fiduciario en el Fideicomiso número 158127
        denominado <strong>"FONDO PLATA ZACATECAS"</strong> representado por su apoderado especial el <strong>L.C. Felipe Ignacio Ávalos
            Pérez</strong>, Administrador del Fondo (en lo sucesivo y para efectos del presente contrato se le denominara <strong>"EL FONDO"
        </strong> ) y por otra parte <strong>{{ $metodo->conversionNombre($expediente->nombre_solicitante)}}
            @if($expediente->conyrepleg_nombreconyusolicitan != "")

            y {{ $metodo->conversionNombre($expediente->conyrepleg_nombreconyusolicitan)}}</strong>

        (en lo sucesivo y
        para efectos del presente contrato a quien denominaremos <strong>"EL ACREDITADO"</strong>), al tenor de las siguientes Declaraciones y
        Cláusulas:
        @endif
        </strong>

    </p>

    <p align="justify">
        I.- Declara <strong>EL FONDO</strong> por conducto de su Administrador:

    </p>
    <p align="justify">
        a).- Que es un Fideicomiso de inversión y administración creado por el Gobierno del Estado de Zacatecas y originalmente
        Administrado por BANCOMER S.A., como <strong>FIDUCIARIA</strong> de conformidad con el contrato de Fideicomiso de Inversión y
        Administración de fecha 16 (dieciséis) de Junio de 1999 (mil novecientos noventa y nueve), mismo que se protocolizó
        ante la fe del Notario Público Número 26 (veintiséis) Licenciado Enrique Varela Parga, mediante acta número 6028 (seis
        mil veintiocho) de fecha 12 (doce) de agosto de 1999 (mil novecientos noventa y nueve) e inscrito en el Registro Público
        de la Propiedad y del Comercio, bajo el número 6 (seis), folios 20-32 (veinte guión treinta y dos), volumen 141 (ciento
        cuarenta y uno) de comercio, de fecha diez (10) de septiembre de 1999 (mil novecientos noventa y nueve).
    </p>

    <p align="justify">
        b).-Mediante acta número 7050 (siete mil cincuenta) de fecha 4 (cuatro) de junio del 2001 (dos mil uno), del protocolo
        del Notario Público Número 26 (veintiséis) Licenciado Enrique Varela Parga, se celebró Convenio de Sustitución de
        Fiduciario y de Institución Bancaria, siendo ahora administrado por Banco Internacional S.A., Institución de Banca
        Múltiple, Grupo Financiero Bital, División Fiduciaria, cuyo primer testimonio se encuentra inscrito en el Registro Público
        de la Propiedad bajo el número 62 (sesenta y dos), folio 130-131 (ciento treinta guión ciento treinta y uno), del volumen
        151 (ciento cincuenta y uno), libro primero sección sexta de fecha 30 (treinta) de julio del 2001 (dos mil uno).
    </p>

    <p align="justify">
        c).-Por escritura número 287881 (doscientos ochenta y siete mil ochocientos ochenta y uno) volumen número 10634
        (diez mil seiscientos treinta y cuatro) de fecha 16 (dieciséis) de diciembre del 2003 (dos mil tres), ante la fe del Licenciado
        Tomas Lozano Molina, Notario Público número 10 (diez) del Distrito Federal, se protocolizó acta de Asamblea General
        Extraordinaria de Accionistas, la cual se encuentra pendiente de inscripción en el Registro Público de la Propiedad y folio
        mercantil 64053 (sesenta y cuatro mil cincuenta y tres, en la cual entre otros acuerdos se determinó cambiar la
        denominación de Banco Internacional S.A., Institución de Banca Múltiple, Grupo Financiero Bital por la de <strong>HSBC México
            S.A., Institución de Banca Múltiple, Grupo Financiero HSBC,</strong> reformando en este sentido sus estatutos.
    </p>


    <p align="justify">
        II.- El <strong>L.C. Felipe Ignacio Ávalos Pérez,</strong> Administrador del Fondo, que acredita su personalidad, como Apoderado de
        <strong>HSBC México S.A., Institución de Banca Múltiple, Grupo Financiero HSBC</strong> (antes Banco Internacional S.A.,
        Institución de Banca Múltiple, Grupo Financiero Bital), mediante Poder General Limitado Para Pleitos y Cobranzas y
        Actos de Administración, para suscribir los contratos de crédito del Fideicomiso Número <strong>158127 </strong>(ciento cincuenta y ocho
        mil ciento veintisiete) denominado <strong>FONDO PLATA ZACATECAS</strong>, mediante acta número <strong>32,873</strong> (treinta y dos mil
        ochocientos setenta y tres) Libro <strong>949</strong> (novecientos cuarenta y nueve) de fecha <strong>13</strong> (trece) de Marzo de 2019 (dos mil
        diecinueve), del protocolo a cargo del <strong>Notario Público Número 223</strong> (doscientos veintitrés) de la Ciudad de México,
        Licenciada Rosamaría López Lugo, cuyo primer testimonio se encuentra inscrito en el Registro Público de la Propiedad
        y del Comercio de Zacatecas, bajo el número de inscripción <strong>0004</strong> (cuatro), del Volumen <strong>2372</strong> (dos mil trescientos setenta
        y dos), Libro Segundo, Sección Primera, de fecha <strong>21</strong> (veintiuno) de <strong>Marzo del 2019</strong> (dos mil diecinueve).
    </p>

    <p align="justify">
        III.- Declara <strong>{{ $metodo->conversionNombre($expediente->nombre_solicitante)}}
            @if($expediente->conyrepleg_nombreconyusolicitan != "")
            y {{ $metodo->conversionNombre($expediente->conyrepleg_nombreconyusolicitan)}}</strong>
        @endif
        que ofrecen como garantía las propias del
        <strong>
            @if($expediente->tipocredito=="CRÉDITO SIMPLE")
            Crédito Simple
            @else
            Cuenta Corriente
            @endif
            "{{{$expediente->productoCredito->producto}}}"</strong>.
    </p>

    <p align="justify">
        IV.- Declara <strong>EL FONDO</strong> que el Presidente Suplente del H. Comité Técnico, autorizó el otorgamiento del crédito solicitado
        por <strong>EL ACREDITADO,</strong> según facultades que le confirió el H. Comité Técnico en la 
        <strong>{{ $metodo->numeroComiteEnletras($expediente->numcomite)}}
        REUNIÓN
        EXTRAORDINARIA, CELEBRADA EL DÍA
        {{ $metodo->fechaParaImprimirContrato($expediente->fecha_reunion_comite)}}</strong>, sujeto
        a que, previo a la formalización del presente contrato, <strong>EL ACREDITADO</strong> le manifestase por escrito que no tiene limitación
        contractual alguna para la celebración del presente contrato, ni para otorgar las garantías ofrecidas. Al efecto la Empresa
        dedicada a “Taller Mecanico, Servicios De” a nombre de Jose Gerardo Soto Mata y Nancy Cecilia Gonzalez Zavala
        ha cumplido con dicha condición, por lo que por parte de EL FONDO no existe inconveniente alguno para la celebración
        del presente contrato
    </p>



    <p> {{ $metodo->prueba()}}</p>

    


</body>

</html>