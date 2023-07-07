<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeoCoderController extends Controller
{
    public function search(Request $request)
    {
        $address = $request->input('rua') . ' ' . $request->input('nr_endereco') .
        ' - ' . $request->input('bairro') . ', ' . $request->input('municipio') ;

        $url = 'https://nominatim.openstreetmap.org/search?format=json&q=' . urlencode($address);

        $response = Http::get($url);

        if ($response->ok()) {
            $data = $response->json();

            if (!empty($data)) {
                $latitude = $data[0]['lat'];
                $longitude = $data[0]['lon'];

                return response()->json([
                    'latitude' => $latitude,
                    'longitude' => $longitude
                ]);
            } else {
                return response()->json([
                    'error' => 'Endereço não encontrado.'
                ]);
            }
        } else {
            return response()->json([
                'error' => 'Erro ao buscar o endereço.'
            ]);
        }
    }
}
