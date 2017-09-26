<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user=new User;
      $user->name='Juan Antonio';
      $user->user='admin';
      $user->password=bcrypt('123456789');
      $user->save();
    }
}
