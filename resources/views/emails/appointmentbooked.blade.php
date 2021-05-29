@component('mail::message')

<h1>Witaj {{$details['name']}}</h1>

<div style="font-size: 25px; margin-bottom: 10px;">
    Zarezerowałeś wizytę na dzień <b>{{$details['date']}}</b> o godzinie <b>{{$details['hours']}}</b>
    do lekarza <b>{{$details['doctor']}}</b>
</div>


<div style="font-size: 15px;margin-bottom: 10px;">
    Otrzymasz kolejną wiadomość gdy recepcja przychodni potwierdzi twoją wizytę lub odrzuci.
</div>

<div style="font-size: 15px;margin-bottom: 10px;">
    Możesz również sledzić status logując się na swoje konto.
</div>


Zespół,<br>
{{ config('app.name') }}
@endcomponent
