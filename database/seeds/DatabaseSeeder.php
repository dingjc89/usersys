<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create(array(
            'name'=>'steve',
            'email'=>'steve@126.com',
            'password'=>'admin',
            'addr'=>'aaa',
        ));
        User::create(array(
            'name'=>'kevin',
            'email'=>'kevin@126.com',
            'password'=>'admin',
            'addr'=>'aaa',
        ));
    }
}
