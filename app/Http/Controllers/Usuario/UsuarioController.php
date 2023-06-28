<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Http\Requests\Usuario\CriarUsuarioRequest;
use App\Http\Requests\Usuario\VerUsuarioRequest;
use App\Services\Usuarios\CriarUsuarioService;
use App\Services\Usuarios\DeletarUsuarioService;
use App\Services\Usuarios\EditarUsuarioService;
use App\Services\Usuarios\VerUsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UsuarioController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CriarUsuarioRequest $request)
    {
        $criarUsuarioService = new CriarUsuarioService();
        $criarUsuarioService->handler($request->all());

        return Response::json([
            'success' => true,
            'message' => 'Sucesso, usuário cadastrado com sucesso',
        ], 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(VerUsuarioRequest $request)
    {
        $criarUsuarioService = new VerUsuarioService();
        $criarUsuarioService->handler($request->all());

        return Response::json([
            'success' => true,
            'message' => 'Sucesso, usuário cadastrado com sucesso',
        ], 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $criarUsuarioService = new EditarUsuarioService();
        $criarUsuarioService->handler($request->all());

        return Response::json([
            'success' => true,
            'message' => 'Sucesso, usuário cadastrado com sucesso',
        ], 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $criarUsuarioService = new DeletarUsuarioService();
        $criarUsuarioService->handler($request->all());

        return Response::json([
            'success' => true,
            'message' => 'Sucesso, usuário cadastrado com sucesso',
        ], 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }
}