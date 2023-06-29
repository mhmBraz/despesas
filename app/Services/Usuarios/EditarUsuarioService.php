<?php

namespace App\Services\Usuarios;

use App\Repositories\Usuarios\UsuarioRepo;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;

class EditarUsuarioService
{
    public function handler(array $options)
    {
        if (auth()->payload()->get('sub') != Arr::get($options, 'id')) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, Você não tem permissão.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }

        try {
            $password = bcrypt(Arr::get($options, 'password'));
            Arr::set($options, 'password', $password);
        } catch (\Throwable $th) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, entre em contato com o Administrador.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }

        try {
            $usuarioRepo = new UsuarioRepo();
            $usuarioRepo->update($options);
        } catch (\Throwable $th) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, entre em contato com o Administrador.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }
    }
}
