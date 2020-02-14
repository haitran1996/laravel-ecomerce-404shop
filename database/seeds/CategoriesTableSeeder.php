<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Category();
        $user->name = 'Accessories';
        $user->description = 'The accessories for all fashion followers';
        $user->image = 'images/categories/accessories.jpg';
        $user->save();
    }
}
