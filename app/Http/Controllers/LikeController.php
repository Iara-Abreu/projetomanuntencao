<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;


class LikeController extends Controller
{
    public function __construct(
        private Like $like
    ) {
    }
    public function store(Request $request)
    {
        try {
            $like = new Like();
            $like->id_demanda = $request->input('id_demanda');
            $like->id_usuario = Auth::id();

            $like->save();

            if ($like->save()) {
                return redirect()->back()->with('success', 'like registrada com sucesso!');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar a like: ' . $ex->getMessage());
        }

        return redirect()->back()->with('error', 'Ocorreu um erro ao cadastrar a like.');
    }

    public function show($id_demanda) {

        $v['like'] = $this->like->where('id_demanda', $id_demanda)->get();

        return response()->view('like.show', $v);

    }
}
