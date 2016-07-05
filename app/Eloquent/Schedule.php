<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $fillable = ['user_id', 'subject_id', 'room_id', 'from_time', 'to_time', 'day', 'created_by'];
    protected $dates = ['created_at', 'updated_at'];
    protected $with = ['users', 'subjects', 'rooms'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('App\Eloquent\User', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subjects()
    {
        return $this->belongsTo('App\Eloquent\Subject', 'subject_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rooms()
    {
        return $this->belongsTo('App\Eloquent\Room', 'room_id');
    }
}
