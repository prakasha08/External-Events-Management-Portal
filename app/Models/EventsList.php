<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventsList extends Model
{
    use HasFactory;
    protected $table = 'events';
    //For mass Assignments by mention each aattribute
    // protected $fillable = ['name','institute','location','mode','end_date','start_date'];
    //Mass Assignment by exception using guarded;
    protected $guarded = [];
}
