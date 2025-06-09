<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'nome' => 'Produto de Teste',
            'codigo_peca' => 'ABC-12345',
            'quantidade' => 50,
            'preco' => 1999, 
            'fornecedor' => 'Fornecedor',
            'lote' => '2025',
            'categoria' => 1, 
            'descricao' => 'Descrição padrão para o produto de teste criado via seeder.',
            'image' => null, 
        ]);
    }
}
