<?php

namespace Modules\Cadastro\Http\Controllers;

use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Cadastro\Entities\HorariosAgendas;
use Modules\Cadastro\Entities\ItensAgendas;

class HorariosAgendasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
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
        $cd_agenda = $request->input("Agenda");

        $ItemAgenda = DB::table('tbl_itensagendas AS ia')
            ->select('ia.*', 'a.ativo AS situacaoAgenda')
            ->leftJoin('tbl_agendas AS a', 'a.cd_agenda', '=', 'ia.fk_agenda')
            ->where('a.cd_agenda', '=', $cd_agenda)
            ->first();

        if ($ItemAgenda->situacaoAgenda == "S") {

            if ($ItemAgenda->gerado == "N") {

                $HorarioInicio = new DateTime($ItemAgenda->hora_inicio);
                $HorarioFinal = new DateTime($ItemAgenda->hora_termino);
                $HorarioFinal = $HorarioFinal->modify('+5 minute');

                $TempoConsulta = $ItemAgenda->tempo_consulta;

                $HoraForm = 'PT' . date('i', strtotime($TempoConsulta)) . 'M';

                $periodoCompetencia = new DatePeriod($HorarioInicio, new DateInterval($HoraForm), $HorarioFinal);

                foreach ($periodoCompetencia as $data) {

                    $data = $data->format('H:i');

                    HorariosAgendas::create([
                        "fk_itemagenda" => $ItemAgenda->cd_itemagenda,
                        "situacao" => "V",
                        "hora" => $data,
                        "ativo" => "S",
                        "created_at" => now()
                    ]);
                }

                $update = DB::update('update tbl_itensagendas set gerado = "S" where cd_itemagenda = ?', [$ItemAgenda->cd_itemagenda]);

                if ($update) {
                    return json_encode("SUCCESS");
                }
            } else {
                return json_encode("DUPLICATE");
            }
        } else {
            return json_encode("INACTIVE");
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
