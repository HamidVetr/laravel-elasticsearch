<?php

use App\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->truncate();
        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            $item = Item::create([
                'title' => $faker->name,
                'body' => $faker->paragraph(),
            ]);

            $item->save();
        }
    }
}
