<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(ItemsTableSeeder::class);

        $items = \App\Models\Item::all();

        foreach ($items as $item) {
            Tag::factory()->count(rand(1,7))->create([
                'item_id' => $item->id,
            ]);
        }
    }
}
