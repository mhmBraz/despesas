<?php

namespace App\Services\Despesas;

use App\Repositories\Despesas\DespesasRepo;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;

class EditarDespesasService
{
    public function handler(array $options, $idDespesa)
    {

        ChecarUsuarioDespesasService::handler($idDespesa);

        try {
            $dataAtual = Carbon::now();
            $dataDespesa = Carbon::createFromFormat('d/m/Y h:i:s', Arr::get($options, 'data') . '00:00:00');
        } catch (\Throwable $th) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, data invalida, digite no seguinte formato: d/m/Y',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }

        if (!$dataAtual->gte($dataDespesa)) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, data maior que a atual',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }

        if (!is_int(Arr::get($options, 'valor')) || Arr::get($options, 'valor') < 0) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, valor da despesa incorreto',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }

        try {
            Arr::set($options, 'idDespesa', $idDespesa);

            $despesasRepo = new DespesasRepo();
            $despesasRepo->update($options);
        } catch (\Throwable $th) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, entre em contato com o Administrador.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }
    }
}
