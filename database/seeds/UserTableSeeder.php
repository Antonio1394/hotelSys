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
      $user->tipo=1;
      $user->estado=1;
      $user->save();

      $user=new User;
      $user->name='Luis pedro';
      $user->user='gerente';
      $user->password=bcrypt('123456789');
      $user->tipo=2;
      $user->estado=1;
      $user->save();

      $user=new User;
      $user->name='Miguel David';
      $user->user='recep';
      $user->password=bcrypt('123456789');
      $user->tipo=3;
      $user->estado=1;
      $user->save();
    }
}
