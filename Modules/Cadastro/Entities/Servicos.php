<?php

namespace Modules\Cadastro\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Servicos extends Model
{
    use HasFactory;

    protected $table = "tbl_servicos";
    protected $primaryKey = "cd_servico";

    protected $fillable = [
        "nome",
        "sexo",
        "valor",
        "porte",
        "ativo"
    ];
}
