<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Article::factory()->times(10)->create();
        Category::factory()->times(4)->create();
        Tag::factory()->times(6)->create();
        // User::factory(1)->create();

        //admin
        User::factory()->create([
            'name' => 'hasan',
            'email' => 'test@gmail.com',
            'password' => Hash::make('1234567890'),
            'is_admin' => true,
        ]);
    }
}
