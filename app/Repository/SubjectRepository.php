<?php

namespace App\Repository;

use App\Eloquent\Subject;
use App\Repository\AbstractRepository;

class SubjectRepository extends AbstractRepository
{
    /**
     * ClassNameRepository constructor.
     */
    public function __construct(Subject $subject)
    {
        $this->model = $subject;
    }
}
