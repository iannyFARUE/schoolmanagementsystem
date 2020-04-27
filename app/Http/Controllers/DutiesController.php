<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Subject;
use App\Teacher;
use App\Section;
use Yajra\DataTables\DataTables;
use App\Duties;
use Illuminate\Support\Facades\DB;

class DutiesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function create()
    {
        $classes = Classes::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $sections = Section::all();


        return view('admin.duties', compact('classes', 'subjects', 'teachers', 'sections'));
    }

    public function store()
    {

        $data = request()->validate([

            'subject_id' => 'required',
            'teacher_id' => 'required',
            'class_id' => 'required',
            'section_id' => 'required',

        ]);

        \App\Duties::create([
            'subject_id' => $data['subject_id'],
            'teacher_id' => $data['teacher_id'],
            'class_id' => $data['class_id'],
            'section_id' => $data['section_id'],

        ]);

        return redirect('/duties/create');
    }

    public function getSubjects()
    {
        return Datatables::of(Duties::query())
            ->editColumn('action', 'admin.column')
            ->make(true);
    }
}
