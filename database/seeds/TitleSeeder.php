<?php
use App\Title;
use Illuminate\Database\Seeder;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = [
            ['id' => 1, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Director', 'description' => 'Reporting to the Board of Directors'],
            ['id' => 3, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Head of HR & Field Support Services', 'description' => 'Reporting to the Network Director'],
            ['id' => 4, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Finance Manager & Trainer', 'description' => 'Reporting to the Network Director'],
            ['id' => 5, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Head of ICT & Learning', 'description' => 'Reporting to the Network Director'],
            ['id' => 6, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Procurement and Logistics officer', 'description' => 'Reporting to the Network Director'],
            ['id' => 7, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Child Protection and People Care Facilitator', 'description' => 'Reporting to Network Director'],
            ['id' => 8, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => ' Child Protection Coordinator', 'description' => 'Reporting to Network Director'],
            ['id' => 9, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Children\'s Coordinator', 'description' => 'Reporting to Network Director'],
            ['id' => 10, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Projects Manager', 'description' => 'Reporting to Network Director'],
            ['id' => 11, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'School Partnerships Manager', 'description' => 'Reporting to Network Director'],
            ['id' => 12, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Accounts Clerk & Trainer', 'description' => 'Reporting to Finance Manager'],
            ['id' => 13, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Monitoring Evaluation & Learning Coordinator', 'description' => 'Reporting to Network Director'],
            ['id' => 14, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Schools Coordinator', 'description' => 'Reporting to Head of ICT and Learning'],
            ['id' => 15, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Teaching Coordinator', 'description' => 'Reporting to Human Resource Manager'],
            ['id' => 16, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Families Officer', 'description' => 'Reporting to Human Resource Manager'],
            ['id' => 17, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'IEC Advocacy Coordinator', 'description' => 'Reporting to Human Resource Manager'],
            ['id' => 18, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Social Development Manager', 'description' => 'Reporting to Human Resource Manager'],
            ['id' => 19, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Fleet Manager & Library Assistant', 'description' => 'Reporting to Human Resource Manager'],
            ['id' => 20, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Church Partnerships Coordinator', 'description' => 'Reporting to Human Resource Manager'],
            ['id' => 21, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Child records Officer', 'description' => 'Reporting to Human Resource Manager'],
            ['id' => 22, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Family Strengthening Coordinator', 'description' => 'Reporting to Human Resource Manager'],
            ['id' => 23, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Finance Assistant', 'description' => 'Reporting to Human Resource Manager'],
            ['id' => 24, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Creative learning Coordinator', 'description' => 'Reporting to Human Resource Manager'],
            ['id' => 25, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Field ICT Technician', 'description' => 'Reporting to Head of ICT and Learning'],
            ['id' => 26, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Learning resources Coordinator', 'description' => 'Reporting to Human Resource Manager'],
            ['id' => 27, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Music Teacher', 'description' => 'Reporting to Human Resource Manager'],
            ['id' => 28, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'ICT Skills Teacher', 'description' => 'Reporting to Head of ICT and Learning'],
            ['id' => 29, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'SEN Bus Driver', 'description' => 'Reporting to Fleet Manager & Library Assistant'],
            ['id' => 30, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'ICT Bus Driver', 'description' => 'Reporting to Fleet Manager & Library Assistant'],
            ['id' => 31, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Children in safe spaces Manager', 'description' => 'Reporting to Network Director'],
            ['id' => 32, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Book Keeper', 'description' => 'Reporting to Finance Manager & Trainer'],
            ['id' => 33, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Administrator and Field support', 'description' => 'Reporting to Head of HR & Field Support Services'],
            ['id' => 34, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Field Officer', 'description' => 'Reporting to Head of HR & Field Support Services'],
            ['id' => 35, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Creative Dancer', 'description' => 'Reporting to Human Resource Manager'],
            ['id' => 36, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Programme Manager', 'description' => 'Reporting to Network Director'],
            ['id' => 37, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Network Consultant', 'description' => 'Reporting to Network Director'],
            ['id' => 38, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Viva Administrator', 'description' => 'Reporting to Network Director'],
            ['id' => 39, 'created_by' => 'fdf3cda0-13f0-11e9-9a86-ab5a0fb32b10', 'name' => 'Accountant', 'description' => 'Reporting to Finance Manager & Trainer'],
        ];
        foreach($titles as $title){
            Title::create($title);
        }
    }
}
