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
        // $this->call(UsersTableSeeder::class);
        factory(App\Models\User::create([
            'name' => 'Sherif',
            'email' =>  'sherif@s.com',
            'password'  =>  bcrypt('111111')
        ]));
    }
}
