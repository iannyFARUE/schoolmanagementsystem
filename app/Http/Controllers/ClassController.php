<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use \App\Classes;

class ClassController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create()
    {

        return view('admin.class');
    }

    public function edit(Classes $class)
    {
        return view('admin.class', compact('class'));
    }
    public function store()
    {


        $data = request()->validate([
            'numeric' => 'required|numeric',
            'cname' => 'required|alpha'




        ]);

        \App\Classes::create([
            'numeric' => $data['numeric'],
            'grade' => $data['cname'],

        ]);

        return redirect('/classes/create');
    }
    public function getClasses()
    {

        return Datatables::of(Classes::query())
            ->addColumn('action', function ($class) {
                $button = ' <div class="dropdown">
                 <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Action
                </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                 <a class="dropdown-item" onclick="deleteClass(' . $class->id . ')"  href="#" id="delete">Delete</a>
                 <a class="dropdown-item"   href="/classes/' . $class->id . '/edit" id="edit">Edit</a>
            </div>
            </div>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
