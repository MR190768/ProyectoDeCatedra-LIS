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
    <h2>JUZGADO ESPECIALIZADO DE INSTRUCCIÓN {{$datos[0]}} DE SAN SALVADOR </h2>
    <p>YO, <strong>{{$datos[1]}}</strong> conocida por <strong>{{$datos[1]}}</strong>, y por <strong>{{$datos[2]}}</strong>, 
        mayor de edad, Abogada, del Departamento de San Salvador, 
        portadora de mi Tarjeta de Identificación de Abogado número 
         <strong>{{$datos[3]}}</strong> y con Número de Identificación Tributaria <strong>{{$datos[4]}}</strong>, 
        A usted con el debido respeto EXPONGO:</p>

    <p>Que vengo ante su respetable autoridad a mostrarme parte como abogado
         defensor en sustitución de cualquier abogado nombrado con anterioridad 
         del joven <strong>{{$datos[5]}}</strong>, 
         quien es procesado en el tribunal a su digno cargo por el delito de agrupaciones 
         ilícitas, dicho poder ha sido otorgado por <strong>{{$datos[6]}}</strong></p>

    <ul>
        <li>Me tenga por parte en el carácter en el que comparezco como abogado
             defensor en sustitución de cualquier otro abogado nombrado con 
             anterioridad del joven <strong>{{$datos[5]}} </strong> para lo cual anexo el poder otorgado.
            </li>
    </ul>
    <p>Señalo para cualquier notificación el Sistema de Notificación Electrónica 
        de la Corte Suprema de Justicia.</p>
        <p>San Salvador, {{$datos[7]}} días del mes {{$datos[8]}} del {{$datos[9]}}. </p>
</body>

</html>