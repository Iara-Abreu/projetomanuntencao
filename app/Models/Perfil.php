<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'perfis';

    protected $primaryKey = 'id_perfil';


    public function selectList()
    {
        $perfis = $this->orderBy('ds_perfil')
            ->get();

        $arr = [];gc
        foreach ($perfis as $perf) {
            $arr[$perf->id_perfil] = $perf->ds_perfil;
        }
        return $arr;
    }

    public function selectListId($ds_perfil)
    {
        $perfil = $this->where('ds_perfil', $ds_perfil)->where('ds_perfil', '!=', 'Admin')->first();

        if ($perfil) {
            $perfis = [$perfil->id_perfil => $perfil->ds_perfil];
        } else {
            $perfis = [];
        }

        return $perfis;
    }
}
