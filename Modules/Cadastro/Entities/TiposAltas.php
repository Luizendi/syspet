<?php

namespace Modules\Cadastro\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TiposAltas extends Model
{
    use HasFactory;

    protected $table = "tbl_tiposaltas";
    protected $primaryKey = "cd_alta";

    protected $fillable = [
        "nome",
        "obito",
        "ativo"
    ];
}
