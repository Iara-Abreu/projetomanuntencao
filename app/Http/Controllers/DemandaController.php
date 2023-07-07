<?php

namespace App\Http\Controllers;

use App\Models\Bairro;
use App\Models\Demanda;

class DemandaController extends Controller
{
    public function __construct(
        private Bairro $bairro,
        private Demanda $demanda
    ) {
    }

    public function index()
    {
    }
    public function create()
    {
        $v['title'] = 'Criar Demanda';
        $v['bairros'] = $this->bairro->selectList();
        return response()->view('demanda.create', $v);
    }

    public function store()
    {
    }

    public function update($id_demanda)
    {
    }

    public function destroy($id_demanda)
    {
    }
}
