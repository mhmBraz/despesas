<?php

namespace App\Services\Despesas;

use App\Repositories\Despesas\DespesasRepo;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;

class VerDespesasService
{
    public function handler(array $options)
    {
        ChecarUsuarioDespesasService::handler($options);

        $despesasRepo = new DespesasRepo();
        return $despesasRepo->verDespesa($options)->toArray();
    }
}
