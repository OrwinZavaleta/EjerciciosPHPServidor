<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert("INSERT INTO products(id, name, description, price, available, product_type, image, time, date, created_at, updated_at) VALUES (1, 'Ceviche', 'pescado', 12.30, TRUE, 'Pescados', '/img/menu2dic2025.png', 'ahora', '2026-01-01', '2026-01-01 10:24:15', '2026-01-01 10:24:15')");
    }
}
