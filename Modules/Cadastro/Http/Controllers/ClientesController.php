<?php

namespace Modules\Cadastro\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Cadastro\Entities\Clientes;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $clientes = Clientes::all();
        return view('cadastro::pages.cadastros.clientes.index', ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('cadastro::pages.cadastros.clientes.new');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $clientes = Clientes::create([
            "nome" => $request->input("Nome"),
            "celular" => $request->input("Celular"),
            "email" => $request->input("Email"),
            "cnpjcpf"=>$request->input("CnpjCpf"),
            "ierg"=>$request->input("IeRg"),
            "cep"=>$request->input("CEP"),
            "endereco"=>$request->input("Endereco"),
            "bairro"=>$request->input("Bairro"),
            "numero"=>$request->input("Numero"),
            "cidade"=>$request->input("Cidade"),
            "estado"=>$request->input("Estado"),
            "ativo" => "S",
            "created_at" => now()
        ]);

        if($clientes){
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
    public function edit(Clientes $cliente)
    {
        return view('cadastro::pages.cadastros.clientes.alter', compact('clientes'));
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

    public function retornaCliente($cliente){

        $clientes = DB::table('tbl_clientes')->where('cd_cliente', '=', $cliente);

        if($clientes->count()>0){

            $clientes = $clientes->first();

            if($clientes->ativo == "S"){
                return json_encode($clientes);
            }else{
                return json_encode("INACTIVE");
            }

        }else{
            return json_encode("ERROR");
        }
    }
}
