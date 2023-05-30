<?php

namespace App\Domains\Manutencao;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class Demanda extends Eloquent
{
    protected $table = 'demanda';

    protected $primaryKey = 'id_demanda';

//    public function
//    {
//
//    }
}
