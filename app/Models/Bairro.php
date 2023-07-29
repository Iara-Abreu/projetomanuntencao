<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    protected $table = 'bairros';

    protected $primaryKey = 'id_bairro';

    public function selectList()
{
    $bairros = $this->select('id_bairro', 'ds_bairro') // Seleciona os campos id_bairro e ds_bairro
    ->orderBy('ds_bairro')
        ->get();

    $arr = [];
    foreach ($bairros as $bar) {
        $arr[$bar->id_bairro] = $bar->ds_bairro;
    }
    return $arr;
}
public function selectListMapa()
{
    $bairros = $this->select('id_bairro', 'ds_bairro') // Seleciona os campos id_bairro e ds_bairro
    ->orderBy('ds_bairro')
        ->get();

    $arr = [];
    foreach ($bairros as $bar) {
        $arr[$bar->ds_bairro] = $bar->ds_bairro;
    }
    return $arr;
}

}
