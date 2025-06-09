<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'codigo_peca',
        'quantidade',
        'preco',
        'fornecedor',
        'lote',
        'categoria',
        'descricao',
        'image',
    ];

    public function productCategory()
    {
    return $this->belongsTo(Productcategory::class, 'categoria');
    }
}
    
