<?php

namespace Modules\Cadastro\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leitos extends Model
{
    use HasFactory;

    protected $table = "tbl_leitos";
    protected $primaryKey = "cd_leito";

    protected $fillable = [
        "fk_porte",
        "nome",
        "isolamento",
        "ativo"
    ];
}
