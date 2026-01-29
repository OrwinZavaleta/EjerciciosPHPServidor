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
        // DB::insert("INSERT INTO products(id, name, description, price, image, created_at, updated_at) VALUES (1, 'Menu Invierno', 'Muchas cosas en este menu', 12.30, '/storage/img/menu2dic2025.png', '2026-01-01 10:24:15', '2026-01-01 10:24:15')");

        DB::insert("INSERT INTO products(id, name, description, price, image, created_at, updated_at) VALUES (1, 'Pastel', 'Es un pastel', 2.00, NULL, '2026-01-12 13:04:19', '2026-01-12 13:04:19')");
        DB::insert("INSERT INTO products(id, name, description, price, image, created_at, updated_at) VALUES (2, 'Pastel de patata', 'Es un pastel con patatas', 5.00, NULL, '2026-01-12 13:04:19', '2026-01-12 13:04:19')");
        DB::insert("INSERT INTO products(id, name, description, price, image, created_at, updated_at) VALUES (3, 'Pavlova de Frutos Rojos', 'Algo muy raro', 4.00, NULL, '2026-01-12 13:06:39', '2026-01-12 13:06:39')");
        DB::insert("INSERT INTO products(id, name, description, price, image, created_at, updated_at) VALUES (4, 'Solomillo de Cerdo Stroganoff', 'No se', 4.00, NULL, '2026-01-12 13:06:39', '2026-01-12 13:06:39')");

        DB::insert("INSERT INTO products(id, name, description, price, image, created_at, updated_at) VALUES (5, 'Albondigas de Pollo', 'No se', 4.00, 'img/albondigasPollo.png', '2026-01-12 13:06:39', '2026-01-12 13:06:39')");
        DB::insert("INSERT INTO products(id, name, description, price, image, created_at, updated_at) VALUES (6, 'Ensalada de Patata', 'No se', 4.00, 'img/ensaladaPatata.png', '2026-01-12 13:06:39', '2026-01-12 13:06:39')");
        DB::insert("INSERT INTO products(id, name, description, price, image, created_at, updated_at) VALUES (7, 'Flan Parisien', 'No se', 4.00, 'img/flanParisien.png', '2026-01-12 13:06:39', '2026-01-12 13:06:39')");

        // DB::insert("INSERT INTO products(id, name, description, price, image, created_at, updated_at) VALUES (5, 'Menu Noviembre 11', 'Un menu con muchas cosas', 123.00, '/storage/img/menu11Nov2025.png', '2026-01-12 13:18:34', '2026-01-12 13:18:34')");

        // DB::insert("INSERT INTO products(id, name, description, price, image, created_at, updated_at) VALUES (6, 'Menu Noviembre 25', 'Un menu con muchas cosas', 32.43, '/storage/img/menu25Nov2025.png', '2026-01-12 13:18:34', '2026-01-12 13:18:34')");

        // DB::insert("INSERT INTO products(id, name, description, price, image, created_at, updated_at) VALUES (7, 'Menu Enero 20', 'Un menu con muchas cosas', 3.12, '/storage/img/20Enero.png','2026-01-12 13:18:34', '2026-01-12 13:18:34')");
    }
}
