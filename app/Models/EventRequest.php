<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRequest extends Model
{
    use HasFactory;

   protected $table = 'events_req'; // Ensure this matches your database table name
    protected $fillable = [
        'faculty_id', 'faculty', 'department', 'special_lab',
        'event_name', 'institute', 'location', 'mode',
        'start_date', 'end_date'
    ];

    public function student()
    {
        return $this->belongsTo(student::class);
    }
    // protected $guarded = [];
}
