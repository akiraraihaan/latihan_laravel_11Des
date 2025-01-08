<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather</title>
</head>
<body>
    <h1>Data Cuaca</h1>
    @foreach($forecasts as $forecast)
    <img src="{{ $weatherService->getWeatherIconUrl($forecast['kodeCuaca']) }}"
         alt="Weather Icon">
    <p>Cuaca: {{ $forecast['cuaca'] }}</p>
    <p>Suhu: {{ $forecast['tempC'] }}°C</p>
    <p>Kelembaban: {{ $forecast['humidity'] }}%</p>
    @endforeach
</body>
</html>
