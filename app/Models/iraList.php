<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class iraList extends Model
{
    use HasFactory;
    protected $table = 'ira';
    //For mass Assignments by mention each aattribute
    // protected $fillable = ['name','institute','location','mode','end_date','start_date'];
    //Mass Assignment by exception using guarded;
    protected $guarded = [];
    public $timestamps = false; // Disable timestamps
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function faculty()
    {
        return $this->belongsTo(faculty::class, 'faculty_id');
    }
}
