<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Alert;
use App\Models\Company;
use App\Models\Product;
use App\Models\Certificate;
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
        $numberofentries = 5;
        $user = User::factory()->create([
            'name' => 'bob',
            'email' => 'bob@gmail.com'
        ]);
        Certificate::factory($numberofentries)->create([
            'user_id' => $user->id
        ]);

        // Alert::factory($numberofentries)->create();
        // Company::factory($numberofentries)->create();
        // Product::factory($numberofentries)->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
