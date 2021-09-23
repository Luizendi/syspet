<?php

namespace Modules\Estoque\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Modules\Estoque\Entities\Compras;


class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $compras = Compras::all();
        return view('estoque::pages.compras.index', ['compras' => $compras]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $fornecedor = DB::table('tbl_fornececdores AS r')
        ->select('r.*', 'e.nome AS fornecedor')
        ->leftJoin('tbl_compras AS e', 'e.fk_fornecedor', '=', 'r.cd_fornecedor')
        ->where('r.ativo', '=', 'S')->get();

    return view('estoque::pages.estoque.compras.new', ['fornecedores' => $$fornecedor]);

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
        return view('estoque::pages.compras.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('estoque::edit');
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
