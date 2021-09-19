<?php

namespace Modules\Cadastro\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Clientes extends Model
{
    use HasFactory;

    protected $table = "tbl_clientes";
    protected $primaryKey = "cd_cliente";

    protected $fillable = [
        "nome",
        "ativo"
    ];
}
