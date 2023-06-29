<?php

namespace App\Services\Despesas;

use App\Repositories\Despesas\DespesasRepo;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;

class EditarDespesasService
{
    public function handler(array $options)
    {

        try {
            $despesasRepo = new DespesasRepo();
            $despesa = $despesasRepo->verDespesa($options)->toArray();
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

        $dataAtual = Carbon::now();
        $dataDespesa = Carbon::createFromFormat('d/m/Y h:i:s', Arr::get($options, 'data') . '00:00:00');

        if (!$dataAtual->gte($dataDespesa)) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, data maior que a atual',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }

        if (Arr::get($options, 'valor') < 0) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, valor da despesa negativo',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }

        try {
            $despesasRepo->update($options);
        } catch (\Throwable $th) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, entre em contato com o Administrador.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }
    }
}
