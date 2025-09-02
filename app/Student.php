<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        'name', 'unique_id', 'email', 'phone', 'course_id', 'gpa'
    ];

    protected $casts = [
        'gpa' => 'decimal:2',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
      public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments')
                    ->withTimestamps();
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('unique_id', 'like', "%{$search}%")
              ->orWhereHas('course', function ($q) use ($search) {
                  $q->where('name', 'like', "%{$search}%");
              });
        });
    }

    public function scopeGpaRange($query, $minGpa, $maxGpa)
    {
        if ($minGpa) {
            $query->where('gpa', '>=', $minGpa);
        }
        if ($maxGpa) {
            $query->where('gpa', '<=', $maxGpa);
        }
        return $query;
    }

    public function scopeCourseFilter($query, $courseId)
    {
        if ($courseId) {
            return $query->where('course_id', $courseId);
        }
        return $query;
    }

}
