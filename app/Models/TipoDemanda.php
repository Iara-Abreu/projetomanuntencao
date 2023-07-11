<?php

namespace App\MOdels;

use Illuminate\Database\Eloquent\Model;

class TipoDemanda extends Model
{
    protected $table = 'tipo_demandas';

    protected $primaryKey = 'id_tipo_demanda';

    public function selectList()
    {
        $tipo_demandas = $this->orderBy('ds_tipo_demanda')
            ->get();

        $arr = [];
        foreach ($tipo_demandas as $bar) {
            $arr[$bar->ds_tipo_demanda] = $bar->ds_tipo_demanda;
        }
        return $arr;
    }
}
