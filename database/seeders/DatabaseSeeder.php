<?php

namespace Database\Seeders;

use App\Models\Rayon;
use App\Models\Rombel;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            Rombel::create([
                'nama_rombel' => 'RPL XI-' . $i
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Rombel::create([
                'nama_rombel' => 'MMD XI-' . $i
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Rombel::create([
                'nama_rombel' => 'TKJ XI-' . $i
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Rombel::create([
                'nama_rombel' => 'RPL X-' . $i
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Rombel::create([
                'nama_rombel' => 'MMD X-' . $i
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Rombel::create([
                'nama_rombel' => 'TKJ X-' . $i
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Rombel::create([
                'nama_rombel' => 'RPL XII-' . $i
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Rombel::create([
                'nama_rombel' => 'MMD XII-' . $i
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Rombel::create([
                'nama_rombel' => 'TKJ XII-' . $i
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Rayon::create([
                'nama_rayon' => 'Cisarua ' . $i,
                'pembimbing_rayon' => 'Asep Saepulloh'
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Rayon::create([
                'nama_rayon' => 'Ciawi ' . $i,
                'pembimbing_rayon' => 'Cecep Kurniawan'
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Rayon::create([
                'nama_rayon' => 'Cibedug ' . $i,
                'pembimbing_rayon' => 'Mr.Moeslih'
            ]);
        }

        User::create([
            'name' => 'Abi Noval Fauzi',
            'email' => 'abinovalfauzi@smkwikrama.sch.id',
            'password' => bcrypt('password'),
            'roles' => 'admin',
        ]);

        User::create([
            'name' => 'Eko Setyono Wibowo',
            'email' => 'echokhannedy@gmail.com',
            'password' => bcrypt('password'),
            'roles' => 'admin',
        ]);


        User::factory(100)->create();
    }
}
