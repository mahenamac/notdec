<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use DB;
use Gate;
use Session;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index',compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'staff_id' => 'required|string|max:20',
            'firstname' => 'required|string|max:20',
            'lastname' => 'required|string|max:20',
            'user_gender' => 'required|string|max:10',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'mobile_phone' => 'required|string|max:20',
            'the_group' => 'required|string',
            'the_title' => 'required|string',
            'the_department' => 'required|string',
            'account_status' => 'required|string|max:20',
        ]);

        User::create([
            'staff_id' => $data['staff_id'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'gender' => $data['user_gender'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['mobile_phone'],
            'group_id' => $data['the_group'],
            'title_id' => $data['the_title'],
            'department_id' => $data['the_department'],
            'account_status' => $data['account_status'],
            'created_by'=>Auth::user()->id
        ]);
        return ['User added succesfully'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    public function search(Request $request)
    {
        $users = User::where(['group_id'=>$request->group_id])->get();
        return $users;
    }

    function getUsers(){
        $llusers = User::pluck('name');
        for($i=0; $i<sizeof($llusers); $i++)
        {
            echo '<option value="'.$llusers[$i].'">';
        }
        unset($llusers);
    }


    public function edit(User $user)
    {
        return User::findOrFail($user->id);
    }

    public function update(Request $request, User $user)
    {
         //validate the received data
         $data = $request->validate([
            'staff_id' => 'required|string|max:10',
            'name' => 'required|string|max:20',
            'gender' => 'required|string|max:10',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'group_id' => 'required|integer|max:50',
            'role_id' => 'required|integer',
            'group_id' => 'required|integer',
            'account_status' => 'nullable|string|max:20',
        ]);

        //save the validated data
        $user->update(
            ['staff_id' => $data['staff_id'],
            'name' => $data['name'],
            'gender' => $data['gender'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'group_id' => $data['group_id'],
            'role_id' => $data['role_id'],
            'group_id' => $data['group_id'],
            'account_status' => $data['account_status'],
            'updated_by'=>Auth::user()->id
        ]);

        return['User Updated Successfully'];
    }

    public function destroy(User $user)
    {
        $user->delete();
    }
}
