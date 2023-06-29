<?php

namespace App\Repositories\Despesas;

use App\Models\Despesas\Despesas;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class DespesasRepo
{
    public function verDespesa(array $options = null)
    {
        return Despesas::query()->where('id', '=', Arr::get($options, 'id'))->first();
    }

    public function update(array $options)
    {
        $despesa = $this->verDespesa(Arr::get($options, 'id'));
        $despesa->descricao = Arr::get($options, 'descricao');
        $despesa->data = Arr::get($options, 'data');
        $despesa->usuario_id = Arr::get($options, 'usuario_id');
        $despesa->valor = Arr::get($options, 'valor');
        $despesa->save();
    }

    public function delete(array $options)
    {
        $despesa = $this->verDespesa(Arr::get($options, 'id'));
        $despesa->save();
    }

    public function store(array $options)
    {
        $despesa = new Despesas();
        $despesa->id = Str::uuid();
        $despesa->descricao = Arr::get($options, 'descricao');
        $despesa->data = Arr::get($options, 'data');
        $despesa->usuario_id = Arr::get($options, 'usuario_id');
        $despesa->valor = Arr::get($options, 'valor');
        $despesa->save();
    }
}
