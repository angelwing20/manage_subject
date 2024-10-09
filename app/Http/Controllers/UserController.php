<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\subject;
use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login(Request $request){
        $login=$request->validate([
            'name'=>'required',
            'password'=>'required'
        ]);
        if (Auth::attempt($login)) {
            return redirect()->route('main')->with('message','Login Success');
        }else{
            return back()->with('message','Login Failed');
        }
    }

    public function addsubject(Request $request){
        $subject=$request->validate([
            'subject'=>'required'
        ]);
        subject::create($subject);
        return back()->with('message','Subject Added');
    }

    public function editsubject(Request $request,subject $id){
        $edit=$request->validate([
            'subject'=>'required'
        ]);
        $id->update($edit);
        return back()->with('message','Subject Updated');
    }

    public function addteacher(Request $request){
        $add=$request->validate([
            't_name'=>'required',
            'age'=>'required|numeric|min:1',
            'gender'=>'required|in:Male,Female',
            'phone'=>'required',
            'subject_id'=>'required'
        ]);
        teacher::create($add);
        return back()->with('message','Teacher Added');
    }

    public function editteacher(Request $request,teacher $id){
        $edit=$request->validate([
            't_name'=>'required',
            'age'=>'required|numeric|min:1',
            'gender'=>'required|in:Male,Female',
            'phone'=>'required',
            'subject_id'=>'required'
        ]);
        $id->update($edit);
        return back()->with('message','Teacher Updated');
    }

    public function addstudent(Request $request){
        $add=$request->validate([
            's_name'=>'required',
            'age'=>'required|numeric|min:1',
            'gender'=>'required|in:Male,Female',
            'phone'=>'required',
            'subject_id'=>'required',
            'teacher_id'=>'required'
        ]);
        student::create($add);
        return back()->with('message','Student Added');
    }

    public function editstudent(Request $request,student $id){
        $edit=$request->validate([
            's_name'=>'required',
            'age'=>'required|numeric|min:1',
            'gender'=>'required|in:Male,Female',
            'phone'=>'required',
            'subject_id'=>'required'
        ]);
        $id->update($edit);
        return back()->with('message','Student Updated');
    }
}
