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
    </style>
</head>

<body>
    <p align="justify" spellcheck="true">
        <strong>CONTRATO PRIVADO de Crédito Simple "{{{$expediente->productoCredito->producto}}}",</strong> que celebran por una parte el
        <strong>HSBC México, S.A.,
            Institución de Banca Múltiple,</strong> Grupo Financiero HSBC, División Fiduciaria (antes Banco Internacional S.A., Institución
        de Banca Múltiple, Grupo Financiero Bital, División Fiduciaria) como fiduciario en el Fideicomiso número 158127
        denominado <strong>"FONDO PLATA ZACATECAS"</strong> representado por su apoderado especial el <strong>L.C. Felipe Ignacio Ávalos
            Pérez</strong>, Administrador del Fondo (en lo sucesivo y para efectos del presente contrato se le denominara <strong>"EL FONDO"
        </strong> ) y por otra parte <strong>{{ $metodo->conversionNombre($expediente->nombre_solicitante)}}</strong> (en lo sucesivo y
        para efectos del presente contrato a quien denominaremos <strong>"EL ACREDITADO"</strong>
        --------------------------------------------------------------------------------------------------------------------------------------
        ---------------------------------------------<div align="center">HOLA</div>----


    </p>
</body>

</html>