<?php

namespace Modules\Cadastro\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Animais extends Model
{
    use HasFactory;

    protected $table = "tbl_animais";
    protected $primaryKey = "cd_animal";

    protected $fillable = [
        "fk_cliente",
        "fk_raca",
        "fk_porte",
        "sexo",
        "castrado",
        "nome",
        "pelagem",
        "foto",
        "data_nascimento",
        "obito",
        "ativo",
    ];
}
