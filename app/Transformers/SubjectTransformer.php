<?php
namespace App\Transformers;

use App\Eloquent\Subject;
use League\Fractal\TransformerAbstract;

class SubjectTransformer extends TransformerAbstract
{

    public function transform(Subject $subject)
    {
        return [
            'id'          => (int)$subject->id,
            'edp_code'    => $subject->edp_code,
            'name'        => $subject->name,
            'description' => $subject->description,
            'type'        => $subject->type,
            'created_at'  => $subject->created_at->diffForHumans()
        ];
    }
}