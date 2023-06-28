<?php

namespace App\Http\Controllers\Despesas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Despesas\CriarDespesasRequest;
use App\Http\Requests\Despesas\DeletarDespesasRequest;
use App\Http\Requests\Despesas\EditarDespesasRequest;
use App\Http\Requests\Despesas\VerDespesasRequest;
use App\Services\Despesas\CriarDespesasService;
use App\Services\Despesas\DeletarDespesasService;
use App\Services\Despesas\EditarDespesasService;
use App\Services\Despesas\VerDespesasService;
use Illuminate\Support\Facades\Response;

class DespesasController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CriarDespesasRequest $request)
    {
        $criarUsuarioService = new CriarDespesasService();
        $criarUsuarioService->handler($request->all());

        return Response::json([
            'success' => true,
            'message' => 'Sucesso, despesa cadastrada com sucesso',
        ], 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(VerDespesasRequest $request)
    {
        $criarUsuarioService = new VerDespesasService();
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
    public function update(EditarDespesasRequest $request)
    {
        $criarUsuarioService = new EditarDespesasService();
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
    public function destroy(DeletarDespesasRequest $request)
    {
        $criarUsuarioService = new DeletarDespesasService();
        $criarUsuarioService->handler($request->all());

        return Response::json([
            'success' => true,
            'message' => 'Sucesso, usuário cadastrado com sucesso',
        ], 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    }
}
