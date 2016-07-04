<?php
namespace App\Transformers;

use App\Eloquent\Room;
use League\Fractal\TransformerAbstract;

class RoomTransformer extends TransformerAbstract
{

    public function transform(Room $room)
    {
        return [
            'id'          => (int)$room->id,
            'room_no'     => $room->room_no,
            'room_type'   => $room->room_type,
            'create_date' => $room->created_at->diffForHumans()
        ];
    }
}