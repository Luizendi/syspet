<?php

namespace Modules\Cadastro\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Cadastro\Entities\Servicos;

class ServicosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $servicos = DB::table('tbl_servicos AS s')->get();
        return view('cadastro::pages.tabelas.servicos.index', ['servicos' => $servicos]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('cadastro::pages.tabelas.servicos.new');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $servicos = Servicos::create([
            "nome" => $request->input("Nome"),
            "sexo" => $request->input("Sexo"),
            "porte" => $request->input("Porte"),
            "valor" => $request->input("Valor"),
            "ativo" => "S",
            "created_at" => now(),
            "updated_at" => now()
        ]);

        if ($servicos) {
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
    public function edit(Servicos $servicos)
    {
        return view('cadastro::pages.tabelas.servicos.alter', compact('servicos'));
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

    public function retornaServicos($servicos)
    {

        $servicos = DB::table('tbl_servicos')->where('cd_servico', '=', $servicos);

        if ($servicos->count() > 0) {

            $servicos = $servicos->first();

            if ($servicos->ativo == "S") {
                return json_encode($servicos);
            } else {
                return json_encode("INACTIVE");
            }
        } else {
            return json_encode("ERROR");
        }
    }
}
