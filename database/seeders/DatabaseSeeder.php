<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\SalarioSeeder;
use Database\Seeders\CategoriasSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //? Ejecutamos el seeder
        $this->call( SalarioSeeder::class );
        $this->call( CategoriasSeeder::class );
    }
}
