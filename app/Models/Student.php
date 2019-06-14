<?php

namespace App\Models;

use App\Models\City;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'second_name',
        'third_name',
        'address',
        'guardian',
        'phone',
        'photo',
        'other_files',
        'gender',
        'classroom_id',
        'status',
        'graduated',
        'left',
        'left_reason',
    ];



    public function class()
    {
        return $this->belongsTo(Classroom::class);
    }


    // function for rendering the other files
    public function getOtherOtherFilesAttribute()
    {
        $file = explode('###', $this->other_files);
        return $file;
    }

}
