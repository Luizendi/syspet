<?php

namespace Modules\Cadastro\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produtos extends Model
{
    use HasFactory;

    protected $table = "tbl_produtos";
    protected $primaryKey = "cd_produto";

    protected $fillable = [
        "nome",
        "ativo"
    ];
}
