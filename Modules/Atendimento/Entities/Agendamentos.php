<?php

namespace Modules\Atendimento\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agendamentos extends Model
{
    use HasFactory;

    protected $table = "tbl_agendamentos";
    protected $primaryKey = "cd_agendamento";

    protected $fillable = [
        "fk_agenda",
        "fk_animal",
        "nome",
        "data_hora",
        "ativo"
    ];
}
