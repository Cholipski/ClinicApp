<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Specialist;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'Doktor']);
        Role::create(['name'=>'Administrator']);
        Role::create(['name'=>'Pacjent']);

        Specialist::create(['name'=> 'Internista']);
        Specialist::create(['name'=> 'Okulista']);
        Specialist::create(['name'=> 'Gastrolog']);
        Specialist::create(['name'=> 'Pulmonolog']);
        // \App\Models\User::factory(10)->create();
    }
}
