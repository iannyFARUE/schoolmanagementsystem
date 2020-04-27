<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Section;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable

{
    //

    protected $guard = 'students';

    protected $guarded = [];



    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function class()
    {

        return $this->belongsTo(Classes::class, 'classes_id');
    }
}
