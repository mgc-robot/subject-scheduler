<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $fillable = ['user_id', 'subject_id', 'room_id', 'from_time', 'to_time', 'day', 'created_by'];
    protected $dates = ['created_at', 'updated_at'];
}
