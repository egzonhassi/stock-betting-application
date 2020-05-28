<?php

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
        $user = new App\User();

        $user->name = "Egzon Hasi";
        $user->email = "egzon@bbros.eu";
        $user->isAdmin = '1';
        $user->password = '$2y$10$MOiJXTFcESGogvjQfOGR3.2xq/UUK84GgjNd5QW9IdIyqzT9v24PG';
        $user->save();

        $user->name = "Muhamed Karajic";
        $user->isAdmin = '1';
        $user->email = "muhamed.karajic@edu.fit.ba";
        $user->password = '$2y$10$MOiJXTFcESGogvjQfOGR3.2xq/UUK84GgjNd5QW9IdIyqzT9v24PG';
        $user->save();

    }
}
