<?php

namespace Modules\Cadastro\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agendas extends Model
{
    use HasFactory;

    protected $table = "tbl_agendas";
    protected $primaryKey = "cd_agenda";

    protected $fillable = [
        "fk_usuario",
        "nome",
        "ativo"
    ];
}
