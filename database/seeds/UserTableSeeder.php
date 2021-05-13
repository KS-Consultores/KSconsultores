<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sentinel::register(array(
            'email'    => 'su@intagono.com',
            'password' => 'intagono123',
            'permissions' => [
                'superuser' => 1,
            ],
        ));

        Sentinel::register(array(
            'email'    => 'admin@intagono.com',
            'password' => 'intagono123',
        ));
    }

}
