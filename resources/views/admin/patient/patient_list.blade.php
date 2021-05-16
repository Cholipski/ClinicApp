<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lista pacjentów</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        font-family: DejaVu Sans;
        font-size: 12px;
    }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table id="patient_table" class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>Email</th>
                        <th>Adres</th>
                        <th>Telefon</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{$i = 1}}
                    @foreach($patients as $patient)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$patient->first_name}}</td>
                        <td>{{$patient->last_name}}</td>
                        <td>{{$patient->email}}</td>
                        <td>{{$patient->address}}</td>
                        <td>{{$patient->phone_number}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>