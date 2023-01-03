<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

use Auth;

class StudentController extends Controller
{
    public function studentRegister()
    {
        Student::create([
            'name' => 'Haresh Chauhan',
            'email' => 'vivek@gmail.com',
            'mobile' => '1234567890',
            'password' => bcrypt('123456'),
            'dob' => '1999-06-19',
            'gr_no' => '85265423'
        ]);    
    }

    public function studentLoginForm()
    {
        return view('student');
    }

    public function studentLoginSubmit(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|exists:students',
            'password' => 'required'
        ]);

        $response = Auth::guard('student')->attempt(['email' => $request->email,'password' => $request->password]);
        
        // WILL AUTHENTICATION STUDENT

        if ($response) {
            // dd(Auth::guard('student')->user()->name.' Login Successfully.');

            // CODE AFTER STUDENT AUTHENTICATION
        	return redirect("dashboard");
        }else{
            return back()->with('error','Invalid Email Or Password');
        }
    }

    public function dashboard() {
    	return view('dashboard');
    }
}
