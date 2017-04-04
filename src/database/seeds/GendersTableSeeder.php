<?php

use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
	/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		collect(static::genders())->each(function($item, $key) {
			Myrtle\Core\Genders\Models\Gender::updateOrCreate(['name' => $item]);
		});
    }

    public static function genders()
    {
        return ['Male', 'Female'];
    }
}
