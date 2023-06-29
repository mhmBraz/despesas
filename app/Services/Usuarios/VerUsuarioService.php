<?php

namespace App\Services\Usuarios;

use App\Repositories\Usuarios\UsuarioRepo;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;

class VerUsuarioService
{
    public function handler(array $options)
    {
        ChecarUsuarioService::handler($options);

        try {
            $usuarioRepo = new UsuarioRepo();
            return $usuarioRepo->usuarioPorId(Arr::get($options, 'id'));
        } catch (\Throwable $th) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, entre em contato com o Administrador.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }
    }
}
