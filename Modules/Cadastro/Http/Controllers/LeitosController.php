<?php

namespace Modules\Cadastro\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Cadastro\Entities\Leitos;

class LeitosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $leitos = DB::table('tbl_leitos AS l')
            ->select('l.*', 'p.nome AS porte')
            ->leftJoin('tbl_portes AS p', 'p.cd_porte', '=', 'l.fk_porte')
            ->get();
        return view('cadastro::pages.tabelas.leitos.index', ['leitos' => $leitos]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $portes = DB::table('tbl_portes')->where('ativo', '=', 'S')->get();
        return view('cadastro::pages.tabelas.leitos.new', ['portes' => $portes]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $leitos = Leitos::create([
            "fk_porte" => $request->input('Porte'),
            "nome" => $request->input('Nome'),
            "isolamento" => $request->input('Isolamento'),
            "situacao" => "L",
            "ativo" => "S",
            "created_at" => now()
        ]);

        if ($leitos) {
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
}
