<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        h1 {
            color:black;
        }
        p{
            text-align: justify;

        }
    </style>
</head>

<body>
    <h2>JUZGADO ESPECIALIZADO DE INSTRUCCIÓN {{$ins}} DE SAN SALVADOR </h2>
    <p>YO, <strong>{{$abName}}</strong> conocida por <strong>{{$abName}}</strong>, y por <strong>{{$abNameSol}}</strong>, 
        mayor de edad, Abogada, del Departamento de San Salvador, 
        portadora de mi Tarjeta de Identificación de Abogado número 
         <strong>{{$abCodigo}}</strong> y con Número de Identificación Tributaria <strong>{{$NIT}}</strong>, 
        A usted con el debido respeto EXPONGO:</p>

    <p>Que vengo ante su respetable autoridad a mostrarme parte como abogada
         defensora en sustitución de cualquier abogado nombrado con anterioridad 
         del joven <strong>{{$imputado}}</strong>, 
         quien es procesado en el tribunal a su digno cargo por el delito de agrupaciones 
         ilícitas, dicho poder ha sido otorgado por <strong>{{$apoderado}}</strong></p>

    <ul>
        <li>Me tenga por parte en el carácter en el que comparezco como abogada
             defensora en sustitución de cualquier otro abogado nombrado con 
             anterioridad del joven <strong>{{$imputado}} </strong> para lo cual anexo el poder otorgado.
            </li>
    </ul>
    <p>Señalo para cualquier notificación el Sistema de Notificación Electrónica 
        de la Corte Suprema de Justicia.</p>
        <p>San Salvador, {{$dia}} días del mes {{$mes}} del {{$año}}. </p>
</body>

</html>