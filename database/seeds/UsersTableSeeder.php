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
        DB::table('users')->insert([
            'firstname' => "ehiaghe",
            'lastname' => "aig",
            'email' => 'ehi@gmail.com',
            'password' => bcrypt('secret'),
            'account_balance'=>0,
            'phone'=>"345678765",
            'user_type'=>'business',
            ''
        ]);
    }
}
