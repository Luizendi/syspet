<?php

namespace Modules\Cadastro\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Especies extends Model
{
    use HasFactory;

    protected $table = "tbl_especies";
    protected $primaryKey = "cd_especie";

    protected $fillable = [
        "nome",
        "ativo"
    ];
}
