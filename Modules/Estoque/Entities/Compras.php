<?php

namespace Modules\Estoque\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Compras extends Model
{
    use HasFactory;

    protected $table = "tbl_compras";
    protected $primaryKey = "cd_compra";

    protected $fillable = [
        "fk_fornecedor",
        "dtachegada",
        "valortotal",
    ];
}
