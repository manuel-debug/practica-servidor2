<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function teacher(){
        return $this->belongsTo(User::class,'teacher_id');
    }

    public function enrollments(){
        return $this->hasMany(Enrollment::class,'course_id');
    }

    public function enrollmentCourses(){
        return $this->belongsToMany(User::class,'enrollments','course_id','user_id')->withPivot('status','created_at');
    }
}
