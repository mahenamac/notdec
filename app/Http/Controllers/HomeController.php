<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Gate;
use Session;
use App\User;
use App\Child;
use App\Home;
use App\Title;
use App\Group;
use App\Comment;
use App\Guardian;
use App\Department;
use App\Activity;
use App\Visitor;
use App\Charts\NodChart;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $users = User::all();
        $children = Child::all();
        $visitors = Visitor::all();
        $guardians = Guardian::all();
        $homes = Home::all();

        $children_gender = Child::selectRaw("count('id') as children,gender" )
                                ->groupBy("gender")
                                ->get();
        $children_health = Child::selectRaw("count('id') as children,health_condition" )
                                ->groupBy("health_condition")
                                ->get();

        $children_district = Child::selectRaw("count('id') as children,district")
                                ->groupBy("district")
                                ->get();



        $userdepartment = User::selectRaw("count('id') as users,departments.name as department")
                                ->join('departments', 'users.department_id', '=', 'departments.id')
                                ->groupBy("departments.name")
                                ->get();
        //User Login Tracker
        // $added_users = User::where(DB::raw("(DATE_FORMAT(last_login,'%Y'))"),date('Y'))->get();
        $today_users = User::whereDate('last_login', today())->count();
        $yesterday_users = User::whereDate('last_login', today()->subDays(1))->count();
        $users_2_days_ago = User::whereDate('last_login', today()->subDays(2))->count();
        $users_3_days_ago = User::whereDate('last_login', today()->subDays(3))->count();
        $users_4_days_ago = User::whereDate('last_login', today()->subDays(4))->count();
        $users_5_days_ago = User::whereDate('last_login', today()->subDays(5))->count();

        //Children per gender

        $genderdata = [];
        $genderlables = [];
        foreach($children_gender as $data){
            array_push($genderdata,[
                    $data->childrendone
            ]);
            array_push($genderlables,[
                $data->gender
            ]);
        }

        //Children per health
        $healthdata = [];
        $healthlables = [];
        foreach($children_health as $data){
            array_push($healthdata,[
                    $data->childrendone
            ]);
            array_push($healthlables,[
                $data->health_condtition
            ]);
        }



        //Children per District

        $districtData = [];
        $districtLables = [];
        foreach($children_district as $data){
            array_push($districtData,[
                    $data->childrendone
            ]);
            array_push($districtLables,[
                $data->district
            ]);
        }

        //children per stage

        // $childData = [];
        // $childLables = [];

        // foreach($child_stages as $data){
        //     array_push($childData,[
        //             $data->currentchildren
        //     ]);
        //     array_push($childLables,[
        //         $data->child_stage
        //     ]);
        // }


        //Staff members per department
        $departmentData = [];
        $departmentLables = [];

        foreach($userdepartment as $data){
            array_push($departmentData,[
                    $data->total
            ]);
            array_push($departmentLables,[
                $data->name
            ]);
        }

        /**
         * Rendering Charts
         */

        //Children Gender
        $genderchart = new NodChart;
        $genderchart->labels($genderlables);
        $colors = ['#2C3E50','#196F3D','#7DCEA0','#D1F2EB','#E8DAEF','#C0392B','#76D7C4','#117864','#E67E22','#AF7AC5'];
        $genderchart = $genderchart->dataset('Children per Gender', 'bar',$genderdata);
        $genderchart->backgroundColor($colors);

        $healthchart = new NodChart;
        $healthchart->labels($healthlables);
        $colors = ['#AF7AC5','#E67E22','#D5DBDB','#C0392B','#76D7C4','#117864','#E67E22','#7DCEA0','#D1F2EB','#E8DAEF'];
        $healthchart = $healthchart->dataset('Children per Status', 'doughnut',$healthdata);
        $healthchart->backgroundColor($colors);

        $userdepartment = new NodChart;
        $userdepartment->labels($departmentLables);
        $userdepartment->title('Users per department');
        $colors = ['#C0392B','#76D7C4','#117864','#E67E22','#AF7AC5','#D5F5E3','#D5DBDB','#7DCEA0','#D1F2EB','#E8DAEF'];
        $userdepartment = $userdepartment->dataset('Group by Department', 'pie',$departmentData);
        $userdepartment->backgroundColor($colors);

        $disctrictchart = new NodChart;
        $disctrictchart->labels($districtLables);
        $colors = ['#C0392B','#76D7C4','#117864','#E67E22','#AF7AC5','#D5F5E3','#D5DBDB','#7DCEA0','#D1F2EB','#E8DAEF'];
        $disctrictchart = $disctrictchart->dataset('Children per District', 'bar',$districtData);
        $disctrictchart->backgroundColor($colors);



        $userchart = new NodChart;
        $userchart->labels(['5 days ago','4 days ago','3 days ago','2 days ago', 'Yesterday', 'Today']);
        $activity = $userchart->dataset('User Activity','line', [$users_5_days_ago,$users_4_days_ago,$users_3_days_ago,$users_2_days_ago, $yesterday_users, $today_users]);
        $colors = ['#943126','#D5DBDB','#7DCEA0','#D1F2EB','#2471A3'];
        $activity->backgroundColor($colors);

        $departmentChart = new NodChart;
        $departmentChart->title('Department');
        $departments = $departmentChart->dataset('Consultants', 'pie', $departmentData);
        $departmentChart->labels($departmentLables);
        $colors = ['#85C1E9','#76D7C4','#F4D03F','#E67E22','#AF7AC5','#943126','#0000FF','#7DCEA0','#D1F2EB','#17a2b8'];
        $departments->backgroundColor($colors);

        //child Chart
        // $childChart = new NodChart;
        // $childChart->labels($childLables);
        // $colors = ['#117864','#E67E22','#AF7AC5','#D5F5E3','#D5DBDB','#7DCEA0','#D1F2EB','#E8DAEF','#C0392B','#76D7C4'];
        // $children = $childChart->dataset('children per Stage', 'bar',$childData);
        // $children->backgroundColor($colors);


        return view('pages.index',compact('children','visitors','guardians','homes','healthchart','genderchart'));
    }

    public function settings(){
        // if(Gate::check('isAdmin') || Gate::check('isManager')){
            $groups = Group::all();
            $departments = Department::all();
            $homes = Home::all();
            $activities = Activity::all();
            $titles = Title::all();
            return view('pages.settings',compact('groups','titles','departments','homes','activities'));
        // }else{
        //     abort(404);
        // }
    }

    public function support(){
        return view('pages.support');
    }

    public function sendMessage(Request $request){

        $this->validate($request,[
            "name"   => "required",
            "email"   => "required|email",
            "subject"   => "required",
            "message_body"   => "required",
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message_body' => $request->message_body,
        ];

        $recipient = "vmugisha@ahcul.com";

        Mail::to($recipient)->send(new FeedbackMail($data));
        return ['Your message has been sent!'];

    }
    public function homes(){
        $homes = Home::all();
    }
}
