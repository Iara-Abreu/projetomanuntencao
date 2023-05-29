<?php

namespace App\Http\Controllers;

use App\Domains\Usuario;

class UsuarioController extends Controller
{
//    public function __construct(private readonly Usuario $infracaoPenal)
//    {
//    }
//
//    public function index()
//    {
//        $v['title'] = 'Infração penal';
//        $v['infracoes'] = $this->infracaoPenal->get();
//
//        if (request()->filled('edit')) {
//            $v['editInfracao'] = $this->infracaoPenal->find(request('edit'));
//        }
//
//        return view('precalc.infracao_penal.index', $v);
//    }
//
//    public function store()
//    {
//        $infracao = $this->infracaoPenal->newInstance();
//        $infracao->lei = request('lei');
//        $infracao->artigo = request('artigo');
//        $infracao->paragrafo = request('paragrafo');
//        $infracao->inciso = request('inciso');
//        $infracao->ano = request('ano');
//        $infracao->mes = request('mes');
//        $infracao->dia = request('dia');
//        $infracao->is_multa = request('is_multa');
//
//        try {
//            if ($infracao->save()) {
//                flash('Infração penal adicionada.')->success();
//            }
//        } catch (\Exception $ex) {
//            flashException($ex);
//            return redirect()->back()->withInput();
//        }
//
//        return redirect()->back();
//    }
//
//    public function update($id)
//    {
//        $infracao = $this->infracaoPenal->find($id);
//        $infracao->lei = request('lei');
//        $infracao->artigo = request('artigo');
//        $infracao->paragrafo = request('paragrafo');
//        $infracao->inciso = request('inciso');
//        $infracao->ano = request('ano');
//        $infracao->mes = request('mes');
//        $infracao->dia = request('dia');
//        $infracao->is_multa = request('is_multa');
//
//        try {
//            if ($infracao->save()) {
//                flash('Alterações salvas.')->success();
//            }
//        } catch (\Exception $ex) {
//            flashException($ex);
//            return redirect()->back()->withInput();
//        }
//
//        return redirect()->route('precalc.infracao_penal.index');
//    }
//
//    public function destroy($id)
//    {
//        $infracao = $this->infracaoPenal->find($id);
//
//        try {
//            if ($infracao->delete()) {
//                flash('Infração penal excluída.')->success();
//            }
//        } catch (\Exception $ex) {
//            flashException($ex);
//            return redirect()->back()->withInput();
//        }
//
//        return redirect()->back();
//    }
}
