<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function getCoordinates(Request $request)
    {
        $address = $request->input('rua') . ', ' . $request->input('nr_endereco') . ', ' . $request->input('bairro') . ', ' . $request->input('municipio');

        // Substitua YOUR_GOOGLE_MAPS_API_KEY pela sua própria chave de API do Google Maps
        $apiKey = 'YOUR_GOOGLE_MAPS_API_KEY';

        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=" . $apiKey;

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if ($data['status'] === 'OK') {
            $coordinates = $data['results'][0]['geometry']['location'];
            return response()->json([
                'success' => true,
                'coordinates' => $coordinates,
                'address' => $data['results'][0]['formatted_address'],
            ]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
