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
    // protected $guarded = [];
    protected $fillable = [
        'student_id',
        'event_id'
    ];
    public $timestamps = false; // Disable timestamps
    public function student()
    {
        return $this->belongsTo(student::class, 'student_id');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function event()
    {
        return $this->belongsTo(EventsList::class, 'event_id');
    }
}
