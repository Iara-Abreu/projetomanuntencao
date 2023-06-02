<?php

namespace App\Domains\Manutencao;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class Usuario extends Eloquent
{
    protected $table = 'usuario';

    protected $primaryKey = 'id_usuario';

//    public function
//    {
//
//    }
}
