<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseManagement extends Model
{
    protected $table = 'courses';
    protected $fillable = ['title', 'description', 'duration', 'instructor'];
}
