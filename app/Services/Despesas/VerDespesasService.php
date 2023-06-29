<?php

namespace App\Services\Despesas;

use App\Repositories\Despesas\DespesasRepo;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;

class VerDespesasService
{
    public function handler(array $options)
    {
        $despesasRepo = new DespesasRepo();
        $despesa = $despesasRepo->verDespesa(Arr::get($options, 'id'))->toArray();

        if (auth()->payload()->get('sub') != Arr::get($despesa, 'usuario_id')) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, Você não tem permissão.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }

        return $despesa;
    }
}
