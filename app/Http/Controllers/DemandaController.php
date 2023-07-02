<?php

namespace App\Http\Controllers;

use App\Domains\Demanda;

class DemandaController extends Controller
{
    public function index()
    {
    }
    public function create()
    {
        $v['title'] = 'Criar Demanda';
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
