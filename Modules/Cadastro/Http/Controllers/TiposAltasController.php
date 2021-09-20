<?php

namespace Modules\Cadastro\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Cadastro\Entities\TiposAltas;

class TiposAltasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $altas = DB::table('tbl_tiposaltas')->get();
        return view('cadastro::pages.tabelas.tiposaltas.index', ['altas' => $altas]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('cadastro::pages.tabelas.tiposaltas.new');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $tipoalta = TiposAltas::create([
            "nome" => $request->input("Nome"),
            "obito" => $request->input("Obito") == "on" ? "S" : "N",
            "ativo" => "S",
            "created_at" => now()
        ]);

        if ($tipoalta) {
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
    public function edit($id)
    {
        return view('cadastro::pages.tabelas.tiposaltas.alter');
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
}
