<?php

namespace App\Services\Usuarios;

use App\Repositories\Usuarios\UsuarioRepo;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;

class EditarUsuarioService
{
    public function handler(array $options)
    {
        $usuarioRepo = new UsuarioRepo();

        try {
            $password = bcrypt(Arr::get($options, 'password'));
            Arr::set($options, 'password', $password);

            $usuarioRepo->update($options);
        } catch (\Throwable $th) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, entre em contato com o Administrador.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }
    }
}
