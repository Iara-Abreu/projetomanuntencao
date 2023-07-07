<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    protected $table = 'bairros';

    protected $primaryKey = 'id_bairro';

    public function selectList()
    {
        $bairros = $this->orderBy('ds_bairro')
            ->get();

        $arr = [];
        foreach ($bairros as $bar) {
            $arr[$bar->ds_bairro] = $bar->ds_bairro;
        }
        return $arr;
    }
}
