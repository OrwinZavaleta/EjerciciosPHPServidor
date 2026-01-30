<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert("INSERT INTO product_offers (id, offer_id, product_id, created_at, updated_at) VALUES (1,1,2, '2026-01-22 00:00:00', '2026-01-22 00:00:00')");
        DB::insert("INSERT INTO product_offers (id, offer_id, product_id, created_at, updated_at) VALUES (2,1,1, '2026-01-22 00:00:00', '2026-01-22 00:00:00')");
        DB::insert("INSERT INTO product_offers (id, offer_id, product_id, created_at, updated_at) VALUES (3,2,3, '2026-01-22 00:00:00', '2026-01-22 00:00:00')");
        DB::insert("INSERT INTO product_offers (id, offer_id, product_id, created_at, updated_at) VALUES (4,2,1, '2026-01-22 00:00:00', '2026-01-22 00:00:00')");
        DB::insert("INSERT INTO product_offers (id, offer_id, product_id, created_at, updated_at) VALUES (5,4,5, '2026-01-22 00:00:00', '2026-01-22 00:00:00')");
        DB::insert("INSERT INTO product_offers (id, offer_id, product_id, created_at, updated_at) VALUES (6,4,6, '2026-01-22 00:00:00', '2026-01-22 00:00:00')");
        DB::insert("INSERT INTO product_offers (id, offer_id, product_id, created_at, updated_at) VALUES (7,4,7, '2026-01-22 00:00:00', '2026-01-22 00:00:00')");
        DB::statement("SELECT setval('product_offers_id_seq', (SELECT MAX(id) FROM product_offers));");
    }
}
