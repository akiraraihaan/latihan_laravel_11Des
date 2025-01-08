<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Services\BMKGWeatherService;

class WeatherController extends Controller
{
    private $weatherService;

    public function __construct(BMKGWeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function regions()
    {
        return response()->json(
            $this->weatherService->getRegions()
        );
    }

    public function nearestRegion(Request $request)
    {
        $validated = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $region = $this->weatherService->findNearestRegion(
            $validated['latitude'],
            $validated['longitude']
        );

        return response()->json($region);
    }

    public function forecast(string $regionId)
    {
        $forecast = $this->weatherService->getWeatherForecast($regionId);
        return response()->json($forecast);
    }

    public function index()
    {
        $weatherService = new BMKGWeatherService();

        // ID kota-kota besar (Jakarta, Surabaya, Bandung, Medan, Makassar)
        $cityIds = ['501233', '501306', '501212', '501203', '501537'];

        $weatherData = [];
        foreach ($cityIds as $cityId) {
            try {
                $forecast = $weatherService->getWeatherForecast($cityId);
                $region = $weatherService->getRegions()->firstWhere('id', $cityId);

                if ($forecast && $region) {
                    $weatherData[] = [
                        'forecast' => $forecast[0], // data terbaru
                        'region' => $region
                    ];
                }
            } catch (\Exception $e) {
                Log::error("Error fetching weather data for city ID {$cityId}: " . $e->getMessage());
                continue;
            }
        }

        return view('weather', compact('weatherData'));
    }
}
