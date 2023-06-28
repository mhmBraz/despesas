<?php

namespace App\Services\Usuarios;

use App\Repositories\Usuarios\UsuarioRepo;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;

class VerUsuarioService
{
    public function handler(array $options)
    {
        $usuarioRepo = new UsuarioRepo();
        return $usuarioRepo->usuarioPorLogin(Arr::get($options, 'login'));
    }
}
