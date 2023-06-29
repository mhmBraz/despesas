<?php

namespace App\Services\Despesas;

use App\Repositories\Despesas\DespesasRepo;

class VerDespesasService
{
    public function handler($idDespesa)
    {
        ChecarUsuarioDespesasService::handler($idDespesa);

        $despesasRepo = new DespesasRepo();
        return $despesasRepo->verDespesa($idDespesa)->toArray();
    }
}
