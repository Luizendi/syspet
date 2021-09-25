<?php

namespace Modules\Cadastro\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Cadastro\Entities\Produtos;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $produtos = DB::table('tbl_produtos AS p')->get();
        return view('cadastro::pages.tabelas.produtos.index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $servicos = DB::table('tbl_servicos')->where('ativo', '=', 'S')->get();
        $embalagens = DB::table('tbl_embalagens')->where('ativo', '=', 'S')->get();
        return view('cadastro::pages.tabelas.produtos.new', ['servicos' => $servicos], ['embalagens'=>$embalagens]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $produtos = Produtos::create([
            "nome" => $request->input("Nome"),
            "ativo" => "S",
            "created_at" => now()
        ]);

        if ($produtos) {
            return json_encode("SUCCESS");
        } else {
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
    public function edit(Produtos $produtos)
    {
        return view('cadastro::pages.tabelas.produtos.alter', compact('produtos'));
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

    public function retornaProdutos($produtos)
    {

        $produtos = DB::table('tbl_produtos')->where('cd_produto', '=', $produtos);

        if ($produtos->count() > 0) {

            $produtos = $produtos->first();

            if ($produtos->ativo == "S") {
                return json_encode($produtos);
            } else {
                return json_encode("INACTIVE");
            }
        } else {
            return json_encode("ERROR");
        }
    }
}
