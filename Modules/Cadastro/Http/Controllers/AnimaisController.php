<?php

namespace Modules\Cadastro\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Cadastro\Entities\Animais;

class AnimaisController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $animais = DB::table('tbl_animais AS a')
        ->select('a.*', 'r.nome AS raca')
        ->leftJoin('tbl_racas AS r', 'r.cd_raca', '=', 'a.fk_raca')
        ->get();
        return view('cadastro::pages.cadastros.animais.index', ['animais' => $animais]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $portes = DB::table('tbl_portes')->where('ativo', '=', 'S')->get();
        $clientes = DB::table('tbl_clientes')->where('ativo', '=', 'S')->get();
        $racas = DB::table('tbl_racas AS r')
        ->select('r.*', 'e.nome AS especie')
        ->leftJoin('tbl_especies AS e', 'e.cd_especie', '=', 'r.fk_especie')
        ->where('r.ativo', '=', 'S')->get();

        return view('cadastro::pages.cadastros.animais.new', ['portes' => $portes, 'clientes' => $clientes, 'racas' => $racas]);
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
    public function edit(Animais $animal)
    {
        return view('cadastro::pages.cadastros.animais.alter', compact('animal'));
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
