<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Demanda extends Model
{
    protected $table = 'demandas';

    protected $primaryKey = 'id_demanda';

    public function bairro()
    {
        return $this->belongsTo(Bairro::class, 'id_bairro');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
