<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use App\User;
use Hash;
class StudentsController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function index()
    {
    	$users = User::latest()->get();
        
    	//dd($students);
    	return view('index', compact('users'));
    }

    public function create()
    {
        return view('auth.register');
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
        // $user->phone = $request->phone;
        $user->email = $request->email;
        // $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->save();
        // dd($user);        

        \Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        
        return redirect()->route('student.show', $user->id)->with('success','Record Added Successfully');

    }
    
    public function edit($id)
    {
        $student = Students::find($id);
        return view('edit',compact('student'));
    }

    public function update(Request $request,$id)
    {
    	$this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'address'=>'required',
        ]);

        $student = Students::find($id);
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->address = $request->address;
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = rand().'.'. $file->getClientOriginalExtension();
            $file->move(public_path('uploads/images'), $fileName);
           
            $student->image = $fileName;
        }else{
            // return $request;
            $student->image = '';
        }
        $student->save();
        return redirect()->route('index')->with('success',$student->id.' No Record edited');
    }

    public function show(Request $request, $userId)
    {   
        $student = Students::where('user_id', $userId)->first();
        
        return view('show',compact('student'));

    }

    public function destroy($id)
    {
        $student = Students::find($id)->delete();
        return redirect()->route('index')->with('success','Record Has been Deleted');
    }
 }
