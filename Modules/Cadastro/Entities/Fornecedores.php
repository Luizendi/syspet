<?php

namespace Modules\Cadastro\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fornecedores extends Model
{
    use HasFactory;

    protected $table = "tbl_fornecedores";
    protected $primaryKey = "cd_fornecedor";

    protected $fillable = [
        "nome",
        "endereco",
        "cnpjcpf",
        "ierg",
        "cep",
        "cidade",
        "estado",
        "ativo"
    ];
}
