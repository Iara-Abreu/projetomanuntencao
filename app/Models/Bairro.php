<?php

namespace App\Domains\Manutencao;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class Bairro extends Eloquent
{
    protected $table = 'bairro';

    protected $primaryKey = 'id_bairro';

//    public function
//    {
//
//    }
}
