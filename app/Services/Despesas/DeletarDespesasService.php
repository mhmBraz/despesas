<?php

namespace App\Services\Despesas;

use App\Repositories\Despesas\DespesasRepo;
use Illuminate\Http\Exceptions\HttpResponseException;

class DeletarDespesasService
{
    public function handler($idDespesa)
    {
        ChecarUsuarioDespesasService::handler($idDespesa);

        try {
            $despesasRepo = new DespesasRepo();
            $despesasRepo->delete($idDespesa);
        } catch (\Throwable $th) {

            throw new HttpResponseException(response()->json([
                'message' => 'Erro, entre em contato com o Administrador.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }
    }
}
