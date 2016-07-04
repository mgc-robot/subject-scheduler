<?php
namespace App\Transformers;

use App\Eloquent\Schedule;
use League\Fractal\TransformerAbstract;

class ScheduleTransformer extends TransformerAbstract
{
    public function transform(Schedule $schedule)
    {
        return [
            'id'         => (int)$schedule->id,
            'user_id'    => (int)$schedule->user_id,
            'subject_id' => (int)$schedule->subject_id,
            'room_id'    => (int)$schedule->room_id,
            'from_time'  => $schedule->from_time,
            'to_time'    => $schedule->to_time,
            'day'        => $schedule->day,
            'created_by' => $schedule->created_by,
            'updated_by' => $schedule->updated_by,
            'created_at' => $schedule->created_at->diffForHumans()
        ];
    }
}