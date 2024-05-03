<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Todo;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'is_admin' => true,
        ]);
        User::factory()->create([
            'name' => 'Kelompok 1',
            'email' => 'kelompok@mail.com',
            'is_admin' => false,
        ]);

        User::factory(100)->create();
        Todo::factory(500)->create();

        Category::create([
            'title' => 'Category A',
            
        ]);
        Category::create([
            'title' => 'Category B',
            
        ]);
        Category::create([
            'title' => 'Category C',
          
        ]);
    }
}