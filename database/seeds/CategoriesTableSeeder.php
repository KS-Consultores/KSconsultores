<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker\Factory::create();

		$data = [
            [
                'name' => 'Contabilidad',
                'description' => $faker->sentence,
                'image' => 'contabilidad.jpg',
            ],
            [
                'name' => 'Legal',
                'description' => $faker->sentence,
                'image' => 'legal.jpg',
            ],
            [
                'name' => 'Auditoría',
                'description' => $faker->sentence,
                'image' => 'auditoria.jpg',
            ]
        ];

        DB::table('categories')->insert($data);
	}

}
