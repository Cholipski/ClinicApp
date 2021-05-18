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
                        <th>Pacjent</th>
                        <th>Godzina</th>
                        <th>Objawy</th>
                        <th>Telefon</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{$i = 1}}
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>
                        {{App\Models\User::where('id', $booking->user_id)->value('first_name')}}
                        {{App\Models\User::where('id', $booking->user_id)->value('last_name')}}
                        </td>
                        <td>{{$booking->time}}</td>
                        <td>{{$booking->symptoms}}</td>
                        <td>{{$booking->phone_number}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>