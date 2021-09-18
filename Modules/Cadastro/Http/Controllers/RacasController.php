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
    public function edit(Racas $raca)
    {
        return view('cadastro::pages.tabelas.racas.alter', compact('racas'));
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
