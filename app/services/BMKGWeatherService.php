<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class BMKGWeatherService
{
    private const BASE_URL = 'https://ibnux.github.io/BMKG-importer';

    /**
     * Get all available regions
     */
    public function getRegions(): Collection
    {
        try {
            $response = Http::get(self::BASE_URL . '/cuaca/wilayah.json');

            if ($response->successful()) {
                return collect($response->json() ?? []);
            }

            throw new Exception('Failed to fetch regions data');
        } catch (\Exception $e) {
            return collect([]);
        }
    }

    /**
     * Find nearest region based on user coordinates
     */
    public function findNearestRegion(float $latitude, float $longitude): ?array
    {
        $regions = $this->getRegions();

        return $regions->map(function ($region) use ($latitude, $longitude) {
            $distance = $this->calculateDistance(
                $latitude,
                $longitude,
                (float) $region['lat'],
                (float) $region['lon']
            );

            return array_merge($region, ['distance' => $distance]);
        })
        ->sortBy('distance')
        ->first();
    }

    /**
     * Get weather forecast for specific region
     */
    public function getWeatherForecast(string $regionId): array
    {
        try {
            $response = Http::get(self::BASE_URL . "/cuaca/{$regionId}.json");

            if ($response->successful()) {
                $data = $response->json();
                return is_array($data) ? $data : [];
            }

            return [];
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Calculate distance between two points using Haversine formula
     */
    private function calculateDistance(
        float $lat1,
        float $lon1,
        float $lat2,
        float $lon2
    ): float {
        $earthRadius = 6371; // Radius of the earth in km

        $latDelta = deg2rad($lat2 - $lat1);
        $lonDelta = deg2rad($lon2 - $lon1);

        $a = sin($latDelta / 2) * sin($latDelta / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($lonDelta / 2) * sin($lonDelta / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }

    /**
     * Get weather icon URL
     */
    public function getWeatherIconUrl(string $iconCode): string
    {
        return self::BASE_URL . "/icon/{$iconCode}.png";
    }
}
