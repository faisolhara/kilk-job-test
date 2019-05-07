<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table      = 'class';
    //

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function studentClass()
    {
        return $this->hasMany(StudentClass::class, 'class_id');
    }
}
