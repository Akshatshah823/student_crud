<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Enrollment extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'course_id'];


}
