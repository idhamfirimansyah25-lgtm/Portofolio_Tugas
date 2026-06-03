<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MenuMakanan;
use illuminate\support\Facades\hash;

class MenuMakananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuMakanan::factory()->count(5)->create([

            'is_available' => true
        ]);

        MenuMakanan::factory()->count(5)->create([
           
            'is_available' => false,
        ]);
    }
}
