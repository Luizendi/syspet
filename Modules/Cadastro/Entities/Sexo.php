<?php

namespace Modules\Cadastro\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sexo extends Model
{
    use HasFactory;

    protected $table = "tbl_sexo";
    protected $primaryKey = "cd_sexo";

    protected $fillable = [
        "nome",
        "ativo"
    ];
}
