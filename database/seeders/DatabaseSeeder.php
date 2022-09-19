<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Multitenancy\Database\Factories\TenantFactory;
use Spatie\Multitenancy\Models\Tenant;

class DatabaseSeeder extends Seeder
{
    use WithFaker;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create user without a tenant
        \App\Models\User::factory()->state([
            "email" => "test@notenant.com",
        ])->createOne();

        // Create a user with a tenant.
        $this->setUpFaker();
        $tenant = new \Spatie\Multitenancy\Models\Tenant();
        $tenant['name'] = $this->faker->name;
        $tenant['domain'] = "";
        $tenant['database'] = "";
        $tenant->save();

        \App\Models\User::factory()->for($tenant)->state([
            "email" => "test@tenant.com",
        ])->createOne();
    }
}
