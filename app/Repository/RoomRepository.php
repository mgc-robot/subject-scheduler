<?php

namespace App\Repository;

use App\Eloquent\Room;
use App\Repository\AbstractRepository;

class RoomRepository extends AbstractRepository
{
    /**
     * ClassNameRepository constructor.
     * @param Room $room
     */
    public function __construct(Room $room)
    {
        $this->model = $room;
    }
}
