<!-- resources/views/weather.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Info Cuaca BMKG</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .weather-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .weather-card {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .weather-card img {
            width: 50px;
            height: 50px;
        }
        h1 {
            color: #333;
        }
        .city-name {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Info Cuaca BMKG</h1>
    <a href="/location">ini utk dpt kan lokasi</a>

    @if(count($weatherData) > 0)
        <div class="weather-grid">
            @foreach($weatherData as $data)
                <div class="weather-card">
                    <div class="city-name">{{ $data['region']['kota'] }}</div>
                    <img src="https://ibnux.github.io/BMKG-importer/icon/{{ $data['forecast']['kodeCuaca'] }}.png"
                         alt="{{ $data['forecast']['cuaca'] }}">
                    <p>Cuaca: {{ $data['forecast']['cuaca'] }}</p>
                    <p>Suhu: {{ $data['forecast']['tempC'] }}°C</p>
                    <p>Kelembaban: {{ $data['forecast']['humidity'] }}%</p>
                    <p>Waktu: {{ $data['forecast']['jamCuaca'] }}</p>
                </div>
            @endforeach
        </div>
    @else
        <div class="no-data">
            <p>Tidak ada data cuaca yang tersedia saat ini. Silakan coba beberapa saat lagi.</p>
        </div>
    @endif
</body>
</html>
