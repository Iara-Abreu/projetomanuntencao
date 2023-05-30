<?php

namespace App\Domains\Manutencao;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class TipoDemanda extends Eloquent
{
    protected $table = 'tipo_demanda';

    protected $primaryKey = 'id_tipo_demanda';

//    public function
//    {
//
//    }
}
