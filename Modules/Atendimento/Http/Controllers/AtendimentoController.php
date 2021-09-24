<?php

namespace Modules\Atendimento\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AtendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $HorariosVagos = DB::table('tbl_horariosagendas')
        ->where('situacao', '=', 'V')
        ->where('ativo', '=', 'S');

        $Agendamentos = DB::table('tbl_agendamentos')
        ->where('ativo', '=', 'S');

        $AgendamentosDia = DB::table('tbl_agendamentos AS a')
        ->select('a.*', 'ha.*', 'c.nome AS cliente', 'an.nome AS animal')
        ->leftJoin('tbl_animais AS an', 'an.cd_animal', '=', 'a.fk_animal')
        ->leftJoin('tbl_clientes AS c', 'c.cd_cliente', '=', 'an.fk_cliente')
        ->leftJoin('tbl_horariosagendas AS ha', 'ha.cd_horario', '=', 'a.fk_horario')
        ->whereDate('data', '=', now());

        $AgendamentosConfirmados = DB::table('tbl_agendamentos AS a')
        ->leftJoin('tbl_horariosagendas AS ha', 'ha.cd_horario', '=', 'a.fk_horario')
        ->whereDate('data', '=', now())
        ->where('confirmado', '=', 'S');

        return view('atendimento::dashboard', 
            [
                'agendamentos' => $Agendamentos->count(),
                'horariosvagos' => $HorariosVagos->count(), 
                'quantidadesAtendimentoDia' => $AgendamentosDia->count(),
                'agendamentosConfirmados' => $AgendamentosConfirmados->count(),
                'agendamentosDia' => $AgendamentosDia->get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('atendimento::create');
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
        return view('atendimento::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('atendimento::edit');
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
