<?php

namespace App\Http\Controllers;

use App\Models\Bairro;
use App\Models\Demanda;
use App\Models\TipoDemanda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DemandaController extends Controller
{
    public function __construct(
        private Bairro $bairro,
        private Demanda $demanda,
        private TipoDemanda $tipoDemanda
    ) {
    }

    public function index()
    {
    }

    private function indexBase64Image($artistas)
    {
        $base64Images = [];

        foreach ($artistas as $artista) {
            $base64 = $artista->imagem;
            $base64Images[$artista->id_artista] = $base64;
        }

        return $base64Images;
    }

    public function create()
    {
        $v['title'] = 'Criar Demanda';
        $v['bairros'] = $this->bairro->selectList();
        $v['tipoDemandas'] = $this->tipoDemanda->selectList();

        return response()->view('demanda.create', $v);
    }

    public function store()
    {
    }

    private function storeBase64Image($imageFile)
    {
        $mimeType = $imageFile->getMimeType();
        $base64 = 'data:' . $mimeType . ';base64,' . base64_encode($imageFile->getContent());
        return $base64;
    }

    public function show()
    {
    }

    private function showBase64Image($artista)
    {
        $base64Images = [
            $artista->id_artista => $artista->imagem
        ];
        return $base64Images;
    }

    public function update($id_demanda)
    {
    }

    public function destroy($id_demanda)
    {
    }
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('imagem')) {
            $image = $request->file('imagem');
            $path = $image->store('images', 'public');

            return response()->json([
                'image_url' => Storage::disk('public')->url($path),
            ]);
        }

        return response()->json(['error' => 'Nenhuma imagem foi enviada.']);
    }
}
