<?php

namespace App\Services\Despesas;

use App\Repositories\Despesas\DespesasRepo;

class VerDespesasService
{
    public function handler(array $options)
    {
        ChecarUsuarioDespesasService::handler($options);

        $despesasRepo = new DespesasRepo();
        return $despesasRepo->verDespesa($options)->toArray();
    }
}
