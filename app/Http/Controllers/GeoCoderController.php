<?php

namespace App\Core\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeocoderController extends Controller
{
    private $apiKeyGeocoder;

    private $geocoderUrl = 'https://api.mapbox.com/geocoding/v5/mapbox.places/';
    private $geocoderToken = 'YOUR_MAPBOX_API_TOKEN';

    public function __construct()
    {
        $this->apiKeyGeocoder = config('manutencao.api_key_geocoder');
    }

    public function search(Request $request)
    {
        $address = $request->input('address');

        if (!$address) {
            return response()->json(['body' => 'Address is empty'], 500);
        }

        $params = [
            'access_token' => $this->geocoderToken,
            'country' => 'BR',
        ];

        $geocoderUrl = $this->geocoderUrl . urlencode($address) . '.json?' . http_build_query($params);

        try {
            $response = Http::get($geocoderUrl);

            if ($response->ok()) {
                $data = $response->json();
                $coordinates = $data['features'][0]['center']; // Obtem as coordenadas do primeiro resultado
                return response()->json(['latitude' => $coordinates[1], 'longitude' => $coordinates[0]], 200);
            } else {
                return response()->json(['body' => 'Geocoding request failed'], $response->status());
            }
        } catch (\Exception $ex) {
            logger()->error('Geocoder failed: ' . $ex->getMessage());
            return response()->json(['body' => 'Geocoding request failed'], 500);
        }
    }
}
