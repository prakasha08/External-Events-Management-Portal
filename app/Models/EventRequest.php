<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRequest extends Model
{
    use HasFactory;

   protected $table = 'events_req'; // Ensure this matches your database table name
    protected $fillable = [
        'event_name', 'institute', 'location', 'mode',
        'start_date', 'end_date','created_at','updated_at','student_id','faculty_id'
    ];

    public function student()
    {
        return $this->belongsTo(student::class);
    }
    public function faculty()
    {
        return $this->belongsTo(faculty::class);
    }
    // protected $guarded = [];
}
