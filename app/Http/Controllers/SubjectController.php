<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Subject;

class SubjectController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create()
    {

        return view('admin.subject');
    }

    public function store()
    {

        $data = request()->validate([

            'name' => 'required|unique:subjects',


        ]);

        \App\Subject::create([
            'name' => $data['name'],


        ]);

        return redirect('/subjects/create');
    }

    public function getSubjects()
    {
        return Datatables::of(Subject::query())
            ->editColumn('action', 'admin.column')
            ->make(true);
    }
}
