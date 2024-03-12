<?php

namespace Database\Seeders;
use App\Models\ProductType;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productTypes = [
            ['category' => 'CD'],
            ['category' => 'DVD'],
            ['category' => 'BLU-RAY'],
            ['category' => 'VINYL'],
            ['category' => 'Merchandise'],

        ];


        foreach ($productTypes as $type) {
            ProductType::create($type);
        }
    }
}
