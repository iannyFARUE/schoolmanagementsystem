<?php

namespace App\Http\Controllers;

use App\User;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Charts\IanChart;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Section;
use App\Classes;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;




class AdminDashboardController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {


        $chart = new IanChart;

        $cherry = new IanChart;

        $bar = new IanChart;

        $chart->labels(['First Term', 'Second Term', 'Third Term']);
        $chart->dataset('Attendance', 'doughnut', collect([20, 34, 10]));


        $cherry->labels(['First Term', 'Second Term', 'Third Term']);
        $cherry->dataset('Attendance', 'pie', collect([10, 4, 10]));


        $bar->labels(['2019', '2020', '2021']);
        $bar->dataset('Pass Rate', 'bar', collect([90, 84, 60]));



        return view("partials.adminHome", compact('chart', 'cherry', 'bar'));
    }


    public function getUsers()
    {

        return Datatables::of(User::query())
            ->editColumn('action', 'admin.column')
            ->setRowId(function ($user) {
                return $user->id;
            })
            ->make(true);
    }

    public function sections()
    {

        return view('admin.section');
    }



    public function getClasses()
    { }




    public function classes()
    {
        return view('admin.class');
    }

    public function create()
    {
        $sections = Section::all();
        $classes = Classes::all();

        return view('admin.student', compact('sections', 'classes'));
    }

    public function store()
    {


        $data = request()->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dob' => 'required',
            'sex' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'student_number' => 'required',
            'curriculum_activities' => '',
            'classy' => '',
            'section' => '',

        ]);

        \App\Student::create([
            'firstname' => $data['fname'],
            'lastname' => $data['lname'],
            'sex' => $data['sex'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'student_number' => $data['student_number'],
            'curriculum_activities' => $data['curriculum_activities'],
            'email' => $data['email'],
            'dob' => $data['dob'],
            'password' => Hash::make($data['lname']),
            'classes_id' => $data['classy'],
            'section_id' => $data['section']
        ]);

        return redirect('/p/create');
    }

    public function edit(Student $student)
    {

        $sections = Section::all();
        $classes = Classes::all();
        return view('admin.student', compact('sections', 'classes', 'student'));
    }

    public function update(Student $student)
    {
        $data = request()->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dob' => 'required',
            'sex' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'student_number' => 'required',
            'curriculum_activities' => '',
            'classy' => '',
            'section' => '',

        ]);
        $student->update(
            [
                'firstname' => $data['fname'],
                'lastname' => $data['lname'],
                'sex' => $data['sex'],
                'phone_number' => $data['phone_number'],
                'address' => $data['address'],
                'student_number' => $data['student_number'],
                'curriculum_activities' => $data['curriculum_activities'],
                'email' => $data['email'],
                'dob' => $data['dob'],
                'classes_id' => $data['classy'],
                'section_id' => $data['section']
            ]
        );

        return redirect('/p/create');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return "True";
    }

    public function getStudents()
    {
        return Datatables::of(Student::query())
            ->addColumn('action', function ($student) {
                $button = ' <div class="dropdown">
                 <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Action
                </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                 <a class="dropdown-item" onclick="deleteStudent(' . $student->id . ')"  href="#" id="delete">Delete</a>
                 <a class="dropdown-item"   href="/p/' . $student->id . '/edit" id="edit">Edit</a>
            </div>
            </div>';
                return $button;
            })
            ->setRowId(function ($user) {
                return $user->id;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
