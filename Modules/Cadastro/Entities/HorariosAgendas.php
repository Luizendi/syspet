<?php

namespace Modules\Cadastro\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HorariosAgendas extends Model
{
    use HasFactory;

    protected $table = "tbl_horariosagendas";
    protected $primaryKey = "cd_horario";

    protected $fillable = [
        "fk_itemagenda",
        "situacao",
        "hora",
        "ativo"
    ];
}
