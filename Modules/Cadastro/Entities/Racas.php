<?php

namespace Modules\Cadastro\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Racas extends Model
{
    use HasFactory;

    protected $table = "tbl_racas";
    protected $primaryKey = "cd_raca";

    protected $fillable = [
        "fk_especie",
        "nome",
        "ativo"
    ];
    
}
