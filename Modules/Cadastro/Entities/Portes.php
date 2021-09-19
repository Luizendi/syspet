<?php

namespace Modules\Cadastro\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portes extends Model
{
    use HasFactory;

    protected $table = "tbl_portes";
    protected $primaryKey = "cd_porte";

    protected $fillable = [
        "nome",
        "ativo"
    ];
}
