<?php
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // se insertan los datos del usuario princitapal en la bd
        User::insert(
            [
                'name'     => 'LikeU',
                'email'    => 'kim@likeu.com',
                'password' => Hash::make('98765'),
            ]
        );
    }
}
