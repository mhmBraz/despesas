<?php

namespace App\Services\Despesas;

use App\Repositories\Despesas\DespesasRepo;
use App\Repositories\Usuarios\UsuarioRepo;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;

class CriarDespesasService
{
    public function handler(array $options)
    {
        $usuarioRepo = new UsuarioRepo();
        $checarLogin = $usuarioRepo->usuarioPorId(Arr::get($options, 'usuario_id'));

        if (!$checarLogin) {
            throw new HttpResponseException(response()->json([
                'message' => 'Aviso, login digitado não existe.',
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

        try {
            $despesasRepo = new DespesasRepo();
            $despesasRepo->store($options);
        } catch (\Throwable $th) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, entre em contato com o Administrador.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }
    }
}
