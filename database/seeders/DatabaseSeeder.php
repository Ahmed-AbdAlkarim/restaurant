<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Chef;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Chef::create([
            'name' => 'الشيف أحمد',
            'specialty' => 'الشواء واللحوم',
            'image' => 'chefs/chef1.jpg',
            'facebook' => 'https://facebook.com/chefahmed',
            'instagram' => 'https://instagram.com/chefahmed',
            'twitter' => 'https://twitter.com/chefahmed',
        ]);
    
        Chef::create([
            'name' => 'الشيف ليلى',
            'specialty' => 'المخبوزات والحلويات',
            'image' => 'chefs/chef2.jpg',
            'facebook' => 'https://facebook.com/cheflaila',
            'instagram' => 'https://instagram.com/cheflaila',
            'twitter' => 'https://twitter.com/cheflaila',
        ]);
    }
}
