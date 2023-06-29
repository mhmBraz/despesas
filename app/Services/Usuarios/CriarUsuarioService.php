<?php

namespace App\Services\Usuarios;

use App\Repositories\Usuarios\UsuarioRepo;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;

class CriarUsuarioService
{
    public function handler(array $options)
    {
        try {
            $usuarioRepo = new UsuarioRepo();
            $checarLogin = $usuarioRepo->usuarioPorLogin(Arr::get($options, 'login'));
            $checarEmail = $usuarioRepo->usuarioPorEmail(Arr::get($options, 'email'));
        } catch (\Throwable $th) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, entre em contato com o Administrador.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }

        if ($checarLogin || $checarEmail) {
            throw new HttpResponseException(response()->json([
                'message' => 'Aviso, login/email digitado já existe.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }

        try {
            $password = bcrypt(Arr::get($options, 'password'));
            Arr::set($options, 'password', $password);

            $usuarioRepo->store($options);
        } catch (\Throwable $th) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, entre em contato com o Administrador.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }
    }
}
