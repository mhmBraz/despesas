<?php

namespace App\Services\Despesas;

use App\Models\Despesas\Despesas;
use App\Repositories\Despesas\DespesasRepo;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;

class DeletarDespesasService
{
    public function handler(array $options)
    {
        ChecarUsuarioDespesasService::handler($options);

        try {
            $despesasRepo = new Despesas();
            $despesasRepo->delete($options);
        } catch (\Throwable $th) {

            throw new HttpResponseException(response()->json([
                'message' => 'Erro, entre em contato com o Administrador.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }
    }
}
