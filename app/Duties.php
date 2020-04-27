<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class Duties extends Model
{
    //
    protected $guarded = [];


    // public function teacher()
    // {

    //     return $this->belongs(Teacher::class);
    // }

    public function getDuties()
    {
        $duties = DB::table('duties')
            ->join('teachers', 'teachers.id', '=', 'duties.teacher_id')
            ->join('subjects', 'subjects.id', '=', 'duties.subject_id')
            ->join('classes', 'classes.id', '=', 'duties.class_id')
            ->join('sections', 'sections.id', '=', 'duties.section_id')
            ->select('subjects.name  as subject', 'teachers.title', 'teachers.lastname', 'classes.numeric', 'sections.name')
            ->get();

        return $duties;
    }
}
