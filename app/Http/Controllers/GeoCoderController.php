<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeoCoderController extends Controller
{
    public function getCoordinates(Request $request)
    {
        try {
            $address = $request->input('rua') . ' ' . $request->input('nr_endereco') . ', ' . $request->input('bairro') . ', ' . $request->input('municipio');

            $url = "https://nominatim.openstreetmap.org/search?q=" . urlencode($address) . "&format=json&addressdetails=1&limit=1";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);

            if ($response === false) {
                throw new \Exception('CURL Error: ' . curl_error($ch));
            }

            curl_close($ch);

            $data = json_decode($response, true);

            if (!empty($data) && isset($data[0]['lat']) && isset($data[0]['lon'])) {
                $coordinates = [
                    'lat' => $data[0]['lat'],
                    'lng' => $data[0]['lon']
                ];
                $formattedAddress = $data[0]['display_name'];

                return response()->json([
                    'success' => true,
                    'coordenadas' => $coordinates,
                    'address' => $formattedAddress
                ]);
            } else {
                return response()->json(['success' => false, 'error' => 'Endereço não encontrado.']);
            }
        } catch (\Exception $e) {
            // Registrar a exceção no log
            \Log::error($e->getMessage());
            return response()->json(['success' => false, 'error' => 'Ocorreu um erro ao processar a solicitação.']);
        }
    }
}
