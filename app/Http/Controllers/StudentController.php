<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use App\Student;
use App\Section;
use App\Classes;


class StudentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:students');
    }

    public function index()
    {
        return view('partials.studentsHome');
    }
}
