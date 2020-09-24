<?php
use App\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            ['id' => 1,'name' =>'Social Workers','description' =>'Social Workers', 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10'],
            ['id' => 2,'name' =>'Accounts','description' =>'Accounts','created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10'],
            ['id' => 3,'name' =>'Donnors','description' =>'Donnors','created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10'],
            ['id' => 4,'name' =>'Administrators','description' =>'Admin','created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10'],
        ];
        foreach($groups as $group){
            Group::create($group);
        }
    }
}
