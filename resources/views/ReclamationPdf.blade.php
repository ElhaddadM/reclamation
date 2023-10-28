<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('./build/assets/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>PDF</title>
</head>
<body>
    <div class="container my-2 border-3  border-primary">

        <h1 class="text-primary fs-1 text-center py-5"> {{ $Title }} </h1>
        <h1 class="text-sucess underline text-center "> Le {{ $Date }} </h1>
        <table class="table my-4">
            <thead>
                <tr>
                    <th>#Ref</th>
                    <th>Name</th>
                    <th>Deparetement</th>
                    <th>Valider</th>
                    <th>Notice</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Data as $value)
                    <tr>
                        <th> {{ $value->id }} </th>
                        <th> {{ $value->Name }} </th>
                        <th> {{ $value->Departement }} </th>
                        <th>
                            @if ( $value->IsValidate  )
                                <span class="text-success">Oui</span>
                            @else
                            <span class="text-danger">Non</span>
                            @endif
                        </th>
                        <th>
                            @if ($value->Notice =='')
                                <span> - </span>
                            @else
                            {{ $value->Notice }}
                            @endif
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
