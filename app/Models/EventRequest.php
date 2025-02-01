<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRequest extends Model
{
    use HasFactory;

    protected $table = 'events_req';
    //For mass Assignments by mention each aattribute
    protected $fillable = ['event_name','institute','location','mode','end_date','start_date','reg_no','student_id'];
    //Mass Assignment by exception using guarded;

    public function student()
    {
        return $this->belongsTo(student::class);
    }
    // protected $guarded = [];
}
