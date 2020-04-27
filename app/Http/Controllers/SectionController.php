<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Section;

use App\Classes;

class SectionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create()
    {

        $classes = Classes::all();

        return view('admin.section', compact('classes'));
    }

    public function store()
    {
        $data = request()->validate([

            'sname' => 'required|unique',
            'classId' => 'required',
        ]);

        \App\Section::create([
            'name' => $data['sname'],
        ])->classess()->attach($data['classId']);

        return redirect('/sections/create');
    }

    public function getSections()
    {
        return Datatables::of(Section::query())
            ->editColumn('action', 'admin.column')
            ->make(true);
    }
}
