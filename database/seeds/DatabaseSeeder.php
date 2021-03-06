<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'name'=>'Admin',
            'email'=>env('MAIL_USERNAME'),
            'password'=>Hash::make(env('MAIL_PASSWORD'))
        ));
    }
}
