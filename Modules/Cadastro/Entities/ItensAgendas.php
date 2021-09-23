<?php

namespace Modules\Cadastro\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItensAgendas extends Model
{
    use HasFactory;

    protected $table = "tbl_itensagendas";
    protected $primaryKey = "cd_itemagenda";

    protected $fillable = [
        "fk_agenda",
        "dom",
        "seg",
        "ter",
        "qua",
        "qui",
        "sex",
        "sab",
        "data_inicio",
        "data_termino",
        "hora_inicio",
        "hora_termino",
        "tempo_consulta",
        "gerado",
        "ativo"
    ];
}
