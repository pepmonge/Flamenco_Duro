<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <img src="{{asset('img/cab.png')}}" alt="">
    <h1>Contacto desde Flamenco Duro</h1>

    <p><strong>Nombre: </strong>{{$contacto['nombre']}}</p>
    <p><strong>Email:</strong> {{$contacto['email']}}</p>
    <p><strong>Asunto:</strong></p>
    <p>{{$contacto['asunto']}}</p>
</body>
</html>