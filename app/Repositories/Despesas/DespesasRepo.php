<?php

namespace App\Repositories\Despesas;

use App\Models\Despesas\Despesas;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class DespesasRepo
{
    public function verDespesa($idDespesa)
    {
        return Despesas::query()->where('id', '=', $idDespesa)->with(['usuario'])->first();
    }

    public function update(array $options)
    {
        $despesa = $this->verDespesa(Arr::get($options, 'idDespesa'));
        $despesa->descricao = Arr::get($options, 'descricao');
        $despesa->data = Arr::get($options, 'data');
        $despesa->valor = Arr::get($options, 'valor');
        $despesa->save();
    }

    public function delete($idDespesa)
    {
        $despesa = $this->verDespesa($idDespesa);
        $despesa->delete();
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
