<!DOCTYPE html>
<html>
<head>
    <title>Create PDF File using DomPDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <p style="font-size: 30px; font-weight: bold;">{{ $title }}</p>
    <p>{{ $date }}</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p>

    <p><strong>Usuario que imprimio resultados </strong></p>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
    </table>

    <table class="table table-bordered">
        <tr>
            <th style="color: rgb(0, 0, 58)">Encuestas del estudio</th>
        </tr>
    @if ($estudio->encuestas != null){
        @foreach($estudio->encuestas as $encuesta)
            <tr>
                <td>{{ $encuesta->titulo }}</td>
            </tr>
        @endforeach
    } 
    @endif
    
</body>
</html>