@component('mail::message')
<h1>Witaj {{$details['name']}}</h1>

<div style="font-size: 25px; margin-bottom: 10px;">
    Twoja wizyt na dzień <b>{{$details['date']}}</b> o godzinie <b>{{$details['hours']}}</b>
    do lekarza <b>{{$details['doctor']}}</b> została potwierdzona przez recepcję przychodni.
</div>


<div style="font-size: 15px;margin-bottom: 10px;">
    Możesz anulować wizytę logując się do panelu pacjenta najpóźniej na 24 godziny przed planowaną wizytą
</div>


Zespół,<br>
{{ config('app.name') }}
@endcomponent

