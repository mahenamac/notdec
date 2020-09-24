<?php

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
        $this->call(DepartmentSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(TitleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
