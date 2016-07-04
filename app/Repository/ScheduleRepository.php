<?php

namespace App\Repository;

use App\Eloquent\Schedule;
use App\Repository\AbstractRepository;

class ScheduleRepository extends AbstractRepository
{
    /**
     * ClassNameRepository constructor.
     * @param Schedule $schedule
     */
    public function __construct(Schedule $schedule)
    {
        $this->model = $schedule;
    }
}
