<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use App\User;
use Hash;
use DB;
use auth;
class StudentsController extends Controller
{
    public function login()
    {
        return view('Admin');
    }
    public function index()
    {
    	$users = User::with('student')->get();
        // dd($users);
        // $students = Students::latest()->get();
        
        //$data['students'] = Students::where('user_id',auth::user()->id)->first();
    	//dd($users);
    	return view('index', compact('users'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {   
        
        // Validate the Field
        // $request->validate($request,[
        //     'name'=>'required',
        //     'phone'=>'required',
        //     'email'=>'required',
        //     'address'=>'required',
        //     'password'=>'required|confirmed'
        // ]); 
        
        $user = new User();
        $user->name = $request->name;
        //$user->phone = $request->phone;
        $user->email = $request->email;
        // $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->save();
        // dd($user);        
        $students = new Students();
        $students->user_id = $user->id;
        $students->phone = $request->phone;
        $students->address = $request->address;
        $students->save();

        // dd($students);
        
        return redirect()->route('index');

    }
    
    public function edit($id)
    {
        $student = Students::find($id);
        return view('edit',compact('student'));
    }

    public function update(Request $request,$id)
    {
    	$this->validate($request,[
            'name',
            'password',
            'email',
            'phone',
            'email',
            'address',
        ]);

        $user = User::find($id);
        $student->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;

        $user = Students::find($id);
        $user->phone = $request->phone;
        $user->address = $request->address;
        
        //if($request->hasFile('image')){
          //  $file = $request->file('image');
            //$fileName = rand().'.'. $file->getClientOriginalExtension();
            //$file->move(public_path('uploads/images'), $fileName);
           
            //$student->image = $fileName;}
            
        
        $user->save();
        return redirect()->route('index')->with('success',$user->id.' No Record edited');
    }

    public function show()
    {   
        //$student = Students::where('user_id', $userId)->first();
        $users = User::with('student')->get();
        
        return view('show',compact('users'));

    }

    public function destroy($id)
    {
        $student = Students::find($id)->delete();
        return redirect()->route('index')->with('success','Record Has been Deleted');
    }

    public function logout()
    {
        return view('logout');
    }
 }
