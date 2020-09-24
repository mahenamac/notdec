<?php
use App\Group;
use App\Title;
use App\User;
use App\Department;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = Group::get_the_first();
        $title = Title::get_the_first();
        $department = Department::get_the_first();
        $users=[
            ['id'=>1,'staff_id'=>'NDC/001','firstname'=>'James','lastname'=>'Developer','gender'=>'male','phone'=>'+256414751506','email'=>'developer@notdecug.org','password' => bcrypt('m!p@ssW0rd'),'department_id'=>$department,'group_id'=>$group,'account_status'=>'Active','title_id'=>$title,'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10'],
            ['id'=>2,'staff_id'=>'NDC/002','firstname'=>'James','lastname'=>'Admin','gender'=>'male','phone'=>'+256414751506','email'=>'admin@notdecug.org','password' => bcrypt('m!p@ssW0rd'),'department_id'=>$department,'group_id'=>$group,'account_status'=>'Active','title_id'=>$title,'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10'],
            ['id'=>3,'staff_id'=>'NDC/003','firstname'=>'James','lastname'=>'User','gender'=>'male','phone'=>'+256414751506','email'=>'user@notdecug.org','password' => bcrypt('m!p@ssW0rd'),'department_id'=>$department,'group_id'=>$group,'account_status'=>'Active','title_id'=>$title,'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10'],
        ];
        foreach($users as $user){
            User::create($user);
        }
    }
}
