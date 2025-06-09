<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordemservico extends Model
{
    use HasFactory;
    protected $table = 'ordemservicos';
    protected $fillable = [
        'id_produto',
        'valor_servico',
        'id_responsavel',
        'data_emissao',
        'data_entrega',
        'tipo_servico',
        'descricao',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_produto');
    }

    public function responsavel()
    {
        return $this->belongsTo(User::class, 'id_responsavel');
    }
}

