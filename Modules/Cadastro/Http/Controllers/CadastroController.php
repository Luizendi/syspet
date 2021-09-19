<?php

namespace Modules\Cadastro\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cadastro\Entities\Clientes;

class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('cadastro::dashboard');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('cadastro::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('cadastro::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('cadastro::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function CadPessoa()
    {
        return view('cadastro::pages.Pessoa.cadpessoa');
    }

    public function indexPessoa()
    {
        $clientes = Clientes::all();
        return view('cadastro::pages.Pessoa.index', ['clientes' => $clientes]);
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storeCliente(Request $request)
    {
        $especie = Clientes::create([
            "nome" => $request->input("Nome"),
            "endereco"=>$request->input("Endereco"),
            "cidade"=>$request->input("Endereco"),
            "estado"=>$request->input("Endereco"),
            "cep"=>$request->input("Endereco"),
            "cnpjcpf"=>$request->input("Endereco"),
            "ierg"=>$request->input("Endereco"),
            "ativo" => "S",
            "created_at" => now()
        ]);

        if($especie){
            return json_encode("SUCCESS");
        }else{
            return json_encode("ERROR");
        }
    }
}
