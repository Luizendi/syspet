<?php

namespace Modules\Cadastro\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cadastro\Entities\Especies;

class EspeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $especies = Especies::all();
        return view('cadastro::pages.tabelas.especies.index', ['especies' => $especies]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('cadastro::pages.tabelas.especies.new');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $especie = Especies::create([
            "nome" => $request->input("Nome"),
            "ativo" => "S",
            "created_at" => now()
        ]);

        if ($especie) {
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
    public function edit(Especies $especie)
    {
        return view('cadastro::pages.tabelas.especies.alter', compact('especie'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $especie)
    {
        $Especie = Especies::findOrFail($especie);

        $update = $Especie->update([
            "nome" => $request->input("Nome"),
            "ativo" => $request->input("Ativo"),
            "updated_at" => now()
        ]);

        if ($update) {
            return json_encode("SUCCESS");
        } else {
            return json_encode("ERROR");
        }
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
