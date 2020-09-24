<?php

use App\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['id' => 1, 'name' => 'Administration', 'code' => 'ADN', 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10'],
            ['id' => 2, 'name' => 'Finance and Accounts', 'code' => 'FNA', 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10'],
            ['id' => 3, 'name' => 'Information Technology', 'code' => 'ICT', 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10'],
            ['id' => 4, 'name' => 'Field Support Services', 'code' => 'FSS', 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10'],
            ['id' => 5, 'name' => 'Social and Community Work', 'code' => 'SCW', 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10'],
        ];
        foreach($departments as $department){
            Department::create($department);
        }
    }
}
