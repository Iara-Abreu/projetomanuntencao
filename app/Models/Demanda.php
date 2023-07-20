<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Demanda extends Model
{
    protected $table = 'demandas';

    protected $primaryKey = 'id_demanda';
}
