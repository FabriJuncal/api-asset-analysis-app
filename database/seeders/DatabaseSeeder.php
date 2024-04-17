<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Ejecuta los Seeders
        $this->call(RolesTableSeeder::class);
        $this->call(CryptosTableSeeder::class);
        $this->call(InvestmentPlatformTableSeeder::class);
        $this->call(CryptosPairsTableSeeder::class);

        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@admin.com',
            "password" => "admin",
            'role_id' => 1,
            'idTypeUser' => 1
        ]);
    }
}
