<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Alert;
use App\Models\Company;
use App\Models\Certificate;
use App\Models\Product;
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
        $numberofentries = 30;
        Certificate::factory($numberofentries)->create();
        Alert::factory($numberofentries)->create();
        Company::factory($numberofentries)->create();
        Product::factory($numberofentries)->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
