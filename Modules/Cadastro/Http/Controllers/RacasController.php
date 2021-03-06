<?php

namespace Modules\Cadastro\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Cadastro\Entities\Racas;

class RacasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $racas = DB::table('tbl_racas AS r')
            ->select('r.*', 'e.nome AS especie')
            ->leftJoin('tbl_especies AS e', 'e.cd_especie', '=', 'r.fk_especie')
            ->get();
        return view('cadastro::pages.tabelas.racas.index', ['racas' => $racas]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $especies = DB::table('tbl_especies')->where('ativo', '=', 'S')->get();
        return view('cadastro::pages.tabelas.racas.new', ['especies' => $especies]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $racas = Racas::create([
            "fk_especie" => $request->input("Especie"),
            "nome" => $request->input("Nome"),
            "ativo" => "S",
            "created_at" => now()
        ]);

        if ($racas) {
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
    public function edit(Racas $raca)
    {
        $especies = DB::table('tbl_especies')->where('ativo', '=', 'S')->get();
        return view('cadastro::pages.tabelas.racas.alter', compact('raca'), ['especies' => $especies]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $raca)
    {
        $Raca = Racas::findOrFail($raca);

        $update = $Raca->update([
            "nome" => $request->input("Nome"),
            "fk_especie" => $request->input("Especie"),
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

    public function retornaRaca($raca)
    {

        $racas = DB::table('tbl_racas AS r')
        ->select('r.*', 'e.nome AS especie')
        ->leftJoin('tbl_especies AS e', 'e.cd_especie', '=', 'r.fk_especie')
        ->where('r.cd_raca', '=', $raca);

        if ($racas->count() > 0) {

            $racas = $racas->first();

            if ($racas->ativo == "S") {
                return json_encode($racas);
            } else {
                return json_encode("INACTIVE");
            }
        } else {
            return json_encode("ERROR");
        }
    }
}
