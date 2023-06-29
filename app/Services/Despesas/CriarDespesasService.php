<?php

namespace App\Services\Despesas;

use App\Models\Usuarios\Usuarios;
use App\Notifications\EnviarEmail;
use App\Repositories\Despesas\DespesasRepo;
use App\Repositories\Usuarios\UsuarioRepo;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Notification;

class CriarDespesasService
{
    public function handler(array $options)
    {

        try {
            $usuario = new UsuarioRepo();
            $usuario = $usuario->usuarioPorId(Arr::get($options, 'usuario_id'));
        } catch (\Throwable $th) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, entre em contato com o Administrador.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }

        if (!$usuario) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, Usuário não encontrado',
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
            $despesasRepo = new DespesasRepo();
            $despesasRepo->store($options);

            $usuario = new UsuarioRepo();
            $usuario = $usuario->usuarioPorId(Arr::get($options, 'usuario_id'));
            Notification::send($usuario, new EnviarEmail($options));
        } catch (\Throwable $th) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, entre em contato com o Administrador.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }
    }
}
