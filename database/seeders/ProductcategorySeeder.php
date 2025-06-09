<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Productcategory;

class ProductcategorySeeder extends Seeder
{
    public function run(): void
    {
        Productcategory::create([
            'nome' => 'Teste' 
        ]);
    }
}