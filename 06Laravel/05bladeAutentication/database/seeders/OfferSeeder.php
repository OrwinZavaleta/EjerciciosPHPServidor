<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert("INSERT INTO offers (id, date_delivery, time_delivery, datetime_limit, created_at, updated_at) VALUES (1, '2026-01-22', '11:30 a 02:23', '2026-01-28', '2026-01-22 00:00:00', '2026-01-22 00:00:00')");
        DB::insert("INSERT INTO offers (id, date_delivery, time_delivery, datetime_limit, created_at, updated_at) VALUES (2, '2026-02-21', '11:30 a 02:23', '2026-01-28', '2026-01-22 00:00:00', '2026-01-22 00:00:00')");
        DB::insert("INSERT INTO offers (id, date_delivery, time_delivery, datetime_limit, created_at, updated_at) VALUES (3, '2026-03-22', '11:30 a 02:23', '2026-01-28', '2026-01-22 00:00:00', '2026-01-22 00:00:00')");
        DB::insert("INSERT INTO offers (id, date_delivery, time_delivery, datetime_limit, created_at, updated_at) VALUES (4, '2026-01-27', '11:30 a 02:23', '2026-02-03', '2026-01-22 00:00:00', '2026-01-22 00:00:00')");
    }
}
