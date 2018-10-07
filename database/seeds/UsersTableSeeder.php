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
        $test_user1 = new User;
        $test_user1->name = 'user1';
        $test_user1->email = 'user1@test.com';
        $test_user1->password = Hash::make('testUser1');
        $test_user1->remember_token = str_random(10);
	$test_user1->role=1;
        $test_user1->save();

        $test_user2 = new User;
        $test_user2->name = 'user2';
        $test_user2->email = 'user2@test.com';
        $test_user2->password = Hash::make('testUser2');
        $test_user2->remember_token = str_random(10);
	$test_user2->role=5;
        $test_user2->save();


        $test_user3 = new User;
        $test_user3->name = 'user3';
        $test_user3->email = 'user3@test.com';
        $test_user3->password = Hash::make('testUser3');
        $test_user3->remember_token = str_random(10);
	$test_user3->role=10;
        $test_user3->save();
    }
}
