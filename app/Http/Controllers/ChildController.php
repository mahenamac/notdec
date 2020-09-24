<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Gate;
use Image;
use Session;
use App\Child;
use App\Guardian;
use App\Referee;
use Illuminate\Http\Request;
class ChildController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $children = Child::all();

        $childGender = DB::table('children')
                            ->selectRaw("count('id') as children,gender")
                            ->groupBy("gender")
                            ->get();

        $childrenDistrict = DB::table('children')
                            ->selectRaw("count('id') as children,district" )
                            ->groupBy("district")
                            ->get();

        // $childCaregiver = DB::table('children')
        //                     ->selectRaw("count('id') as children,child_liveswith" )
        //                     ->groupBy("child_liveswith")
        //                     ->get();

        return view('children.index',compact('children'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'admission_number'=> 'required|string|max:20',
            'child_name' => 'required|string|max:20',
            'child_gender' => 'required|string|max:10',
            'birth_date' => 'nullable|date',
            'birth_order' => 'nullable|string',
            'clan' => 'nullable|string',
            'religion' => 'nullable|string|max:20',
            'totem' => 'nullable|string|max:20',
            'mother' => 'required|string',
            'mother_alive' => 'required|string',
            'mother_phone' => 'nullable|string',
            'father' => 'required|string',
            'father_alive' => 'required|string',
            'father_phone' => 'nullable|string',
            'abandoned' =>'required|string',
            'village' => 'nullable|string',
            'parish' => 'nullable|string',
            'subcounty' => 'nullable|string',
            'district' => 'nullable|string',
            'circumstances' => 'required|string',
            'admission_reason' => 'required|string',
            'admission_date' => 'required|date|before:today',
            'health_condition' => 'required|string',
            'care_order' => 'nullable|string',
            'presiding_magistrate' => 'nullable|string',
            'duration' =>'required|string',
            'duration_type' =>'required|string',
            'guardian_name' => 'required|string',
            'guardian_address' =>'required|string',
            'relationship' =>'required|string',
            'guardian_contact' =>'required|string',
            'council_name' => 'required|string',
            'council_address' => 'required|string',
            'council_phone' => 'required|string'
        ]);

        $guardian = Guardian::create([
            'name' => $data['guardian_name'],
            'address' => $data['guardian_address'],
            'relationship' => $data['relationship'],
            'contact' => $data['guardian_contact'],
            'created_by'=>Auth::user()->id
        ]);

        $referee = Referee::create([
            'name' => $data['council_name'],
            'address' => $data['council_address'],
            'phone' => $data['council_phone'],
            'created_by'=>Auth::user()->id
        ]);

        Child::create([
            'guardian_id' => $guardian->id,
            'referee_id' => $referee->id,
            'admission_number'=> $data['admission_number'],
            'name' => $data['child_name'],
            'gender' => $data['child_gender'],
            'birthdate'=>isset($data['birth_date'])? $data['birth_date']:NULL,
            'birth_order'=>isset($data['birth_order'])? $data['birth_order']:NULL,
            'clan'=>isset($data['clan'])? $data['clan']:NULL,
            'religion'=>isset($data['religion'])? $data['religion']:NULL,
            'totem'=>isset($data['totem'])? $data['totem']:NULL,
            'father'=>isset($data['father'])? $data['father']:NULL,
            'father_alive'=>isset($data['father_alive'])? $data['father_alive']:NULL,
            'father_phone'=>isset($data['father_phone'])? $data['father_phone']:NULL,
            'mother'=>isset($data['mother'])? $data['mother']:NULL,
            'mother_alive'=>isset($data['mother_alive'])? $data['mother_alive']:NULL,
            'mother_phone'=>isset($data['mother_phone'])? $data['mother_phone']:NULL,
            'abandoned' => $data['abandoned'],
            'district'=>isset($data['district'])? $data['district']:NULL,
            'sub_county'=>isset($data['subcounty'])? $data['subcounty']:NULL,
            'parish'=>isset($data['parish'])? $data['parish']:NULL,
            'village'=>isset($data['village'])? $data['village']:NULL,
            'circumstances' => $data['circumstances'],
            'admission_reason' => $data['admission_reason'],
            'health_condition'=> $data['health_condition'],
            'care_order'=>isset($data['care_order'])? $data['care_order']:NULL,
            'presiding_magistrate'=>isset($data['presiding_magistrate'])? $data['village']:NULL,
            'village'=>isset($data['village'])? $data['village']:NULL,
            'village'=>isset($data['village'])? $data['village']:NULL,
            'duration'=> $data['duration'],
            'duration_type'=> $data['duration_type'],
            'admission_date'=> $data['admission_date'],
            'created_by'=>Auth::user()->id
        ]);

        return ['Child added succesfully'];
    }

    public function picture(Request $request)
    {
        $msg ='';

        if($request->hasFile('picture')){
            $picture = $request->file('picture');
            $filename = time() . '.' .$picture->getClientOriginalExtension();
            Image::make($picture)->fit(300,300)->save( public_path('/images/'.$filename));
            $child = Child::findOrFail($request->the_child_id);
            if($child) {
                $child->picture = $filename;
                $child->updated_by = Auth::user()->id;
                $updated = $child->save();
            }
            ($updated)? $msg .='Picture added successfully': $msg .='Sorry, picture not added';
        }
        return $msg;
    }

    public function show(Child $child)
    {
        //return $child;
        return view('children.show',compact('child'));
    }

    public function edit(Child $child)
    {
        return $child;
    }

    public function update(Request $request, Child $child)
    {
        $message ='';
        $data = $request->validate([
            'admission_number'=> 'required|string|max:20',
            'child_name' => 'required|string|max:20',
            'child_gender' => 'required|string|max:10',
            'birth_date' => 'nullable|date',
            'birth_order' => 'nullable|string',
            'clan' => 'nullable|string',
            'religion' => 'nullable|string|max:20',
            'totem' => 'nullable|string|max:20',
            'mother' => 'required|string',
            'mother_alive' => 'required|string',
            'mother_phone' => 'nullable|string',
            'father' => 'required|string',
            'father_alive' => 'required|string',
            'father_phone' => 'nullable|string',
        ]);

        $child->update([
            'admission_number' => $data['admission_number'],
            'name' => $data['child_name'],
            'gender' => $data['child_gender'],
            'birthdate'=>isset($data['birth_date'])? $data['birth_date']:NULL,
            'birth_order'=>isset($data['birth_order'])? $data['birth_order']:NULL,
            'clan'=>isset($data['clan'])? $data['clan']:NULL,
            'religion'=>isset($data['religion'])? $data['religion']:NULL,
            'totem'=>isset($data['totem'])? $data['totem']:NULL,
            'father'=>isset($data['father'])? $data['father']:NULL,
            'father_alive'=>isset($data['father_alive'])? $data['father_alive']:NULL,
            'father_phone'=>isset($data['father_phone'])? $data['father_phone']:NULL,
            'mother'=>isset($data['mother'])? $data['mother']:NULL,
            'mother_alive'=>isset($data['mother_alive'])? $data['mother_alive']:NULL,
            'mother_phone'=>isset($data['mother_phone'])? $data['mother_phone']:NULL,
            'updated_by'=>Auth::user()->id
        ]);

        ($child)? $message .='Child updated succesfully':$message .='Child update failed';
        return $message;
    }

    public function listChildren(Request $request)
    {
        $children = Child::where("firstname","LIKE","%".$request->child_name."%")->orWhere("lastname","LIKE","%".$request->child_name."%")->limit(10)->get();

        if($children){
            return $children;
        }
    }

    public function destroy(Child $child)
    {
        if($child->delete()){
            return ['Child deleted successfully'];
        }else{
            return ['Could not delete child'];
        }
    }
}
