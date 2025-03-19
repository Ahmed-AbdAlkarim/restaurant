<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\About;
class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'title' => 'Welcome to Restoran',
            'subtitle' => 'About Us',
            'description_1' => 'Tempor erat elitr rebum at clita...',
            'description_2' => 'Aliqu diam amet diam et eos...',
            'years_experience' => 20,
            'master_chefs' => 21
        ]);
    }
}
