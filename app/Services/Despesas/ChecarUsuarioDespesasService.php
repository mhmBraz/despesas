<?php

namespace App\Services\Despesas;

use App\Repositories\Despesas\DespesasRepo;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;

class ChecarUsuarioDespesasService
{
    static function handler($idDespesa)
    {
        try {
            $despesasRepo = new DespesasRepo();
            $despesa = $despesasRepo->verDespesa($idDespesa)->toArray();
        } catch (\Throwable $th) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, entre em contato com o Administrador.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }

        if (auth()->payload()->get('sub') != Arr::get($despesa, 'usuario_id')) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, Você não tem permissão.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }
    }
}
