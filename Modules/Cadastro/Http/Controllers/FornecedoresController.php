<?php

namespace Modules\Cadastro\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Cadastro\Entities\Fornecedores;

class FornecedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $fornecedores = Fornecedores::all();
        return view('cadastro::pages.tabelas.fornecedores.index', ['fornecedores' => $fornecedores]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('cadastro::pages.tabelas.fornecedores.new');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $fornecedores = Fornecedores::create([
            "nome" => $request->input("Nome"),
            "endereco"=>$request->input("Endereco"),
            "cidade"=>$request->input("Cidade"),
            "estado"=>$request->input("Estado"),
            "cep"=>$request->input("CEP"),
            "cnpjcpf"=>$request->input("CnpjCpf"),
            "ierg"=>$request->input("IeRg"),
            "ativo" => "S",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        if($fornecedores){
            return json_encode("SUCCESS");
        }else{
            return json_encode("ERROR");
        }
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
    public function edit(Fornecedores $fornecedor)
    {
        return view('cadastro::pages.tabelas.fornecedores.alter', compact('fornecedores'));
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

    public function retornaFornecedor($fornecedores){

        $fornecedores = DB::table('tbl_fornecedores')->where('cd_fornecedor', '=', $fornecedores);

        if($fornecedores->count()>0){

            $fornecedores = $fornecedores->first();

            if($fornecedores->ativo == "S"){
                return json_encode($fornecedores);
            }else{
                return json_encode("INACTIVE");
            }

        }else{
            return json_encode("ERROR");
        }
    }
}
