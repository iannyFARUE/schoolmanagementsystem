<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    protected $guarded = [];

    public function student()
    {

        return $this->hasOne(Student::class, 'classes_id');
    }

    public function classess()
    {

        return $this->belongsToMany(Classes::class)->withTimestamps();
    }
}
