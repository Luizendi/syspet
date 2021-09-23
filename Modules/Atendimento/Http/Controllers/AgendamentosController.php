<?php

namespace Modules\Atendimento\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AgendamentosController extends Controller
{

    public function __construct()
    {
        
    }

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
        $Servicos = DB::table('tbl_servicos')->where('ativo', '=', 'S')->get();
        $Animais = DB::table('tbl_animais AS a')
            ->select('a.*', 'r.nome AS raca', 'e.nome AS especie', 'c.nome AS tutor', 'c.cnpjcpf AS cpftutor')
            ->leftJoin('tbl_clientes AS c', 'c.cd_cliente', '=', 'a.fk_cliente')
            ->leftJoin('tbl_racas AS r', 'r.cd_raca', '=', 'a.fk_raca')
            ->leftJoin('tbl_especies AS e', 'e.cd_especie', '=', 'r.fk_especie')
            ->where('a.ativo', '=', 'S')
            ->get();

        return view('atendimento::pages.agendamentos.new', ['horario' => $Horario, 'servicos' => $Servicos, 'animais' => $Animais]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        
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
