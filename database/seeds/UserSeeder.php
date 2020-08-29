<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=> 'Wayne',
                'email'=> 'admin@gmail.com',
                'password'=> 'w@123456'
            ],
            [
                'name'=> 'Hilary',
                'email'=> 'user@gmail.com',
                'password'=> 'h@123456'
            ]
        ];

        foreach ($users as $user){
            User::create($user);
        }

        $faker = Faker\Factory::create();

        for($i = 0; $i < 50; $i++) {
            App\User::create([
                                 'name' => $faker->name,
                                 'email' => $faker->email,
                                'password'=> $faker->password
                             ]);
        }

        $user = factory(App\User::class,50)->create();

    }
}
