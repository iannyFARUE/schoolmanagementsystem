<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Teacher;
use Illuminate\Support\Facades\Hash;
use App\Subject;


class TeacherController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    //
    public function create()
    {
        $subjects = Subject::all();
        return view('admin.teacher', compact('subjects'));
    }

    public function store()
    {


        $data = request()->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dob' => 'required',
            'sex' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'jobType' => '',
            'title' => '',
            'specialty' => 'required',





        ]);

        \App\Teacher::create([
            'firstname' => $data['fname'],
            'lastname' => $data['lname'],
            'sex' => $data['sex'],
            'phone_number' => $data['contact'],
            'address' => $data['address'],
            'job_type' => $data['jobType'],
            'title' => $data['title'],
            'email' => $data['email'],
            'specialty' => $data['specialty'],
            'password' => Hash::make($data['lname']),
        ]);

        return redirect('/teacher/create');
    }



    public function getTeachers()
    {
        return Datatables::of(Teacher::query())
            ->editColumn('action', 'admin.column')
            ->make(true);
    }
}
