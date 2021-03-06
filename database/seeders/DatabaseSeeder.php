<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Company;
use App\Models\Employee;
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
        User::create([
        	'name'=>'Admin',
        	'email'=>'admin@transisi.id',
        	'password'=>bcrypt('transisi')
        ]);
        // Create company with random employee count
        $companies = Company::factory(10)
        ->has(Employee::factory()->count(mt_rand(2,10)))
        ->create();

    }
}
