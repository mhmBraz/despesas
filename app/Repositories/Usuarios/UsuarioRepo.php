<?php

namespace App\Repositories\Usuarios;

use App\Models\Usuarios\Usuarios;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class UsuarioRepo
{
    public function usuarioPorId($id)
    {
        return Usuarios::query()->where('id', '=', $id)->first();
    }

    public function usuarioPorEmail($email)
    {
        return Usuarios::query()->where('email', '=', $email)->first();
    }

    public function usuarioPorLogin($login)
    {
        return Usuarios::query()->where('login', '=', $login)->first();
    }

    public function update(array $options)
    {
        $usuario = $this->usuarioPorId(Arr::get($options, 'idUsuario'));
        $usuario->password = Arr::get($options, 'password');
        $usuario->save();
    }

    public function store(array $options)
    {
        $usuario = new Usuarios();
        $usuario->id = Str::uuid();
        $usuario->login = Arr::get($options, 'login');
        $usuario->password = Arr::get($options, 'password');
        $usuario->email = Arr::get($options, 'email');
        $usuario->save();
    }
}
