<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Request;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Request::create([
            'user_id' => $user->id,
            'start_date' => '2023-01-01',
            'end_date' => '2023-01-15',
            'comment' => 'asdasdasdasdasdasd',
            'status' => 'rejected'
        ]);

        Request::create([
            'user_id' => $user->id,
            'start_date' => '2023-03-01',
            'end_date' => '2023-04-01',
            'comment' => 'asdasdasdasdasdasd',
            'status' => 'pending'
        ]);

        Request::create([
            'user_id' => $user->id,
            'start_date' => '2023-01-15',
            'end_date' => '2023-02-01',
            'comment' => 'asdasdasdasdasdasd',
            'status' => 'approved'
        ]);
    }
}
