<?php

namespace App\Models\Despesas;

use App\Models\User\Usuarios;
use Illuminate\Database\Eloquent\Model;

class Despesas extends Model
{

    protected $table = 'despesas';

    protected $primaryKey = 'id';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'descricao',
        'data',
        'usuario_id',
        'valor'
    ];

    public function usuarios()
    {
        return $this->hasOne(Usuarios::class);
    }
}
