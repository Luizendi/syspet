<?php

namespace Modules\Cadastro\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class SexoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $sexo = DB::table('tbl_sexo AS s')
            ->select('s.*', 's.nome AS sexo')
            ->leftJoin('tbl_servicos AS se', 'se.cd_servico', '=', 's.fk_servico')
            ->get();
        return view('cadastro::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('cadastro::create');
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

    public function retornaSexo($sexo)
    {

        $sexo = DB::table('tbl_sexo AS s')
            ->select('s.*', 's.nome AS sexo')
            ->leftJoin('tbl_servicos AS se', 'se.cd_servico', '=', 's.fk_servico')
            ->where('s.cd_sexo', '=', $sexo);

        if ($sexo->count() > 0) {

            $sexo = $sexo->first();

            if ($sexo->ativo == "S") {
                return json_encode($sexo);
            } else {
                return json_encode("INACTIVE");
            }
        } else {
            return json_encode("ERROR");
        }
    }
}
