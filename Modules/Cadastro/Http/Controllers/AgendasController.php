<?php

namespace Modules\Cadastro\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Cadastro\Entities\Agendas;
use Modules\Cadastro\Entities\ItensAgendas;

class AgendasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $agendas = DB::table('tbl_agendas')->get();
        return view('cadastro::pages.cadastros.agendas.index', ['agendas' => $agendas]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $usuarios = DB::table('users')->get();
        return view('cadastro::pages.cadastros.agendas.new', ['usuarios' => $usuarios]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $Agenda = Agendas::create([
            "nome" => $request->input('Nome'),
            "fk_usuario" => $request->input('Responsavel'),
            "ativo" => $request->input('Ativo'),
            "created_at" => now()
        ]);

        if($Agenda){
            $cd_agenda = $Agenda->cd_agenda;

            $ItemAgenda = ItensAgendas::create([
                "fk_agenda" => $cd_agenda,
                "dom" => $request->input('Dom') == "on" ? "S" : "N",
                "seg" => $request->input('Seg') == "on" ? "S" : "N",
                "ter" => $request->input('Ter') == "on" ? "S" : "N",
                "qua" => $request->input('Qua') == "on" ? "S" : "N",
                "qui" => $request->input('Qui') == "on" ? "S" : "N",
                "sex" => $request->input('Sex') == "on" ? "S" : "N",
                "sab" => $request->input('Sab') == "on" ? "S" : "N",
                "data_inicio" => date('Y-m-d', strtotime($request->input('DataInicio'))),
                "data_termino" => date('Y-m-d', strtotime($request->input('DataFinal'))),
                "hora_inicio" => date('H:i', strtotime($request->input('HorarioInicio'))),
                "hora_termino" => date('H:i', strtotime($request->input('HorarioFinal'))),
                "tempo_consulta" => date('H:i', strtotime($request->input('TempoConsulta'))),
                "gerado" => "N",
                "ativo" => $request->input('Ativo'),
                "created_at" => now()
            ]);

            if($ItemAgenda){
                return json_encode("SUCCESS");
            }else{
                return json_encode("ERROR");
            }

        }else{
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
