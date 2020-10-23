<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['category_name' => 'Kompresor AC / Pendingin'],
            ['category_name' => 'Pipe AC / Pendingin'],
            ['category_name' => 'Freon Refrigerant'],
        ]);

        DB::table('brands')->insert([
            ['brand_name' => 'Bitzer'],
            ['brand_name' => 'Henry Technologies'],
            ['brand_name' => 'Muller'],
            ['brand_name' => 'Ziehl-Abegg'],
        ]);
    }
}
