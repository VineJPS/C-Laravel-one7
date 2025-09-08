<?php

namespace Database\Seeders;

use Database\Factories\RoleFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory()->create(['name' => 'admin']);
        Role::factory()->create(['name' => 'customer']);

    }
}
