<?php

namespace App\Services\Usuarios;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;

class ChecarUsuarioService
{
    static function handler(array $options)
    {
        if (auth()->payload()->get('sub') != Arr::get($options, 'id')) {
            throw new HttpResponseException(response()->json([
                'message' => 'Erro, Você não tem permissão.',
                'success' => false
            ], 403, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
        }
    }
}
