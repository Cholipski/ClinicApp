<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lista pacjentów</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <style>
    body {
        font-family: DejaVu Sans;
        font-size: 12px;
    }
    table, td, th {
        border: 1px solid black;
      }
      
    table {
        width: 100%;
        border-collapse: collapse;
      }
    h1, h3{
        text-align: center;
    }
    </style>
</head>
<body>
    <h1>Lista pacjentów</h1>
    <h3>dr. {{$doctor->first_name}} {{$doctor->last_name}}</h3>
    <h3>{{$date}}</h3>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table class="table">
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
                        <td>{{App\Models\User::where('id', $booking->user_id)->value('phone_number')}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>