<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= User::factory()->create([
            'name' => 'Employer',
            'email' => 'employer@example.com',
        ]);
        $user->assignRole('employer');
    }
}
