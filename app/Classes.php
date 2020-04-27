<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Classes extends Model
{
    protected $guarded = [];
    protected $table_name = 'classes';

    public function student()
    {

        return $this->hasOne(Student::class, 'classes_id');
    }

    public function sections()
    {

        return $this->belongsToMany(Section::class)->withTimestamps();
    }
}
