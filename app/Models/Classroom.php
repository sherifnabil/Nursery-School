<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'level',
        'room_num',
        'seats_number'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);

    }

    protected $appends = [ 'getFullClassAttribute'];
    public function getFullClassAttribute()
    {
        return $this->level . '/' . $this->room_num;
    }
}
