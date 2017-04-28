<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new \App\Models\User;
        $user->name = 'Jean-Marc Amon';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('12345');
        $user->active = true;
        $user->confirm = true;
        $user->save();
    }
}
