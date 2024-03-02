<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create 10 sample items
        foreach (range(1, 10) as $index) {
            Item::create([
                'name' => 'Item ' . $index,
                'description' => 'Description for Item ' . $index,
            ]);
        }
    }
}
