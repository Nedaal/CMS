<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::where('email','nedal@gmail.com')->first();

        if(!$user){
            User::create(
                [
                    
                  'name'=>'nedal Kassem',
                  'email'=>'nedal@gmail.com',
                  'password'=>Hash::make('password')
                ]
                );
        }

    }
}
