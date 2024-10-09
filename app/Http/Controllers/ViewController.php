<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\subject;
use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    //
    public function loginpage(){
        return view('login');
    }

    public function main(Request $request){
        $search = $request->input('search');
        
        if ($search) {
            $subjects = subject::where('subject', 'like', '%' . $search . '%')->get();
        } else {
            $subjects = subject::all();
        }

        $teachers = Teacher::all();

        return view('main', [
            'subjects' => $subjects,
            'teachers' => $teachers,
            'searchs' => $search
        ]);
    }

    public function viewsubject(Request $request,$id){
        $search = $request->input('search');
        
        if ($search) {
            $students = student::where('s_name', 'like', '%' . $search . '%')->where('subject_id', $id)->get();
        } else {
            $students = student::where('subject_id', $id)->get();
        }

        return view('viewsubject',[
           'subject'=>subject::find($id),
           'students'=>$students,
           'search'=>$search
        ]);
    }

    public function deletesubject(Request $request,subject $id){
        $id->delete();
        return back()->with('message','Subject Deleted');
    }

    public function addteacherpage(){
        return view('addteacher',[
            'subjects'=>subject::all()
        ]);
    }
    
    public function viewteacher(Request $request,$id){
        $search = $request->input('search');
        
        if ($search) {
            $students = student::where('s_name', 'like', '%' . $search . '%')->where('teacher_id', $id)->get();
        } else {
            $students = student::where('teacher_id', $id)->get();
        }

        return view('viewteacher',[
            'search'=>$search,
            'students' => $students,
            'teacher'=>teacher::find($id)   
        ]);
    }

    public function editteacherpage($id){
        return view('editteacher',[
            'teachers'=>teacher::find($id),
            'subjects'=>subject::all()
        ]);
    }
    
    public function deleteteacher(Request $request,teacher $id){
        $id->delete();
        return redirect()->route('main')->with('message','Teacher Deleted');
    }

    public function addstudentpage(){
        return view('addstudent',[
            'subjects'=>subject::all(),
            'teachers'=>teacher::all()
        ]);
    }

    public function editstudentpage($id){
        return view('editstudent',[
            'students'=>student::find($id),
            'subjects'=>subject::all(),
            'teachers'=>teacher::all()
        ]);
    }

    public function deletestudent(student $id){
        $id->delete();
        return redirect()->route('main')->with('message','Student Deleted');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginpage')->with('message','Logout Success');
    }
}
