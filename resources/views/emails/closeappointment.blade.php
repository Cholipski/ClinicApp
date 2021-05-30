@component('mail::message')
<h1>Witaj {{$details['name']}}</h1>

<div style="font-size: 25px; margin-bottom: 10px;">
    Twoja wizyt na dzień <b>{{$details['date']}}</b> o godzinie <b>{{$details['hours']}}</b>
    do lekarza <b>{{$details['doctor']}}</b> została zakończona.
</div>

@if($details['prescription'] == 1)
<div style="font-size: 20px; margin-bottom: 10px;">
    Recepta została wystawiona możesz podejrzeć ją logując się do panelu pacjenta.
</div>
@endif



Zespół,<br>
{{ config('app.name') }}
@endcomponent

