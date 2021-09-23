<?php

namespace Modules\Atendimento\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AgendamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('atendimento::pages.agendamentos.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($horario)
    {
        $Horario = DB::table('tbl_horariosagendas')->where('cd_horario', '=', $horario)->first();
        return view('atendimento::pages.agendamentos.new', ['horario' => $Horario]);
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

    public function retornaAgendamentos()
    {
        $agendamentos = DB::table('tbl_horariosagendas AS hg')
            ->select('hg.*', 'ig.*', 'ag.*')
            ->leftJoin('tbl_itensagendas AS ig', 'ig.cd_itemagenda', '=', 'hg.fk_itemagenda')
            ->leftJoin('tbl_agendas AS ag', 'ag.cd_agenda', '=', 'ig.fk_agenda')
            ->where('ag.ativo', '=', 'S')
            ->where('ig.gerado', '=', 'S')
            ->get();

        foreach ($agendamentos as $item) {

            $TempoConsulta = date('i', strtotime($item->tempo_consulta));

            $HoraFinal = date('H:i', strtotime("+" . $TempoConsulta . " minutes", strtotime($item->hora)));

            $Array[] = array(
                "id" => $item->cd_horario,
                "title" => "Horário " . $item->hora,
                "start" => date('Y-m-d H:i', strtotime($item->data . $item->hora)),
                "end" => date('Y-m-d H:i', strtotime($item->data . $item->hora)),
                "className" => $item->situacao == 'A' ? "event-azure" : "event-green",
            );
        }

        return json_encode($Array);
    }
}
