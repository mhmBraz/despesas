<?php

namespace App\Repositories\Despesas;

use App\Models\Despesas\Despesas;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class DespesasRepo
{
    public function verDespesa(array $options = null)
    {
    }

    public function update(array $options)
    {
    }

    public function delete(array $options)
    {
    }

    public function store(array $options)
    {
        $despesas = new Despesas();
        $despesas->id = Str::uuid();
        $despesas->descricao = Arr::get($options, 'descricao');
        $despesas->data = Arr::get($options, 'data');
        $despesas->usuario_id = Arr::get($options, 'usuario_id');
        $despesas->valor = Arr::get($options, 'valor');
        $despesas->save();
    }
}
