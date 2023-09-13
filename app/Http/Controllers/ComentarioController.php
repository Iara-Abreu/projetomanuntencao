<?php

namespace App\Http\Controllers;

use App\Models\Bairro;
use App\Models\Like;
use App\Models\Comentario;
use App\Models\Demanda;
use App\Models\TipoDemanda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DemandaController extends Controller
{
    public function __construct(
         protected Like $like
    ) {
    }

    public function store(Request $request)
    {
        try {
            $like = new Like();

            $like->ds_like = $request->input('like');
            $like->id_usuario = Auth::id();
            $like->id_demanda = $request->input('id_demanda');

            if ($like->save()) {
                return redirect()->back();
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar a like: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar a like.');
    }

    public function show()
    {
    }


    public function update($id_like)
    {
    }

    public function destroy($id_demanda)
    {
    }

}
