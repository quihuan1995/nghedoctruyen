<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chap;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Chap::factory(40)->create();
        $this->call([
            GenreSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            RoleUserSeed::class,
            AccentSeeder::class,
            AuthorSeeder::class,
        ]);
    }
}
