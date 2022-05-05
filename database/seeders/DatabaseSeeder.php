<?php

namespace Database\Seeders;

use App\Models\Equipe;
use App\Models\Projet;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Equipe::factory(5)->create();
        User::factory(5)->create();
        Projet::factory(5)->create();
        Tache::factory(100)->create();

    }
}
