<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteRequest;
use App\Http\Requests\SubjectRequest;
use App\Repository\SubjectRepository;
use App\Transformers\SubjectTransformer;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;

class SubjectController extends BaseController
{

    protected $subjectRepository;
    protected $subjectTransformer;

    public function __construct(SubjectRepository $subjectRepository, SubjectTransformer $subjectTransformer)
    {
        $this->subjectRepository = $subjectRepository;
        $this->subjectTransformer = $subjectTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $limit = $request->get('limit') ?: env('PAGE_LIMIT', 15);
            $subject = $this->subjectRepository->paginate($limit);

            return $this->paginator($subject, new $this->subjectTransformer);
        } catch (Exception $e) {
            return $this->errorInternal($e);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param SubjectRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        try {
            $data =
                [
                    'edp_code'    => $request->get('edp_code'),
                    'name'        => $request->get('name'),
                    'description' => $request->get('description'),
                    'type'        => $request->get('type'),
                    'unit'        => $request->get('unit')
                ];

            if ($request->has('id')) {
                $subject = $this->subjectRepository->update($data, $request->get('id'));
            } else {
                $subject = $this->subjectRepository->create($data);
            }

            return $this->item($subject, new $this->subjectTransformer);
        } catch (Exception $e) {
            return $this->errorInternal($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $subject = $this->subjectRepository->with('instructor', 'schedules')->where('id', '=', $id)->get();
            if (!$subject->isEmpty()) {
                return $this->xhr($subject, new $this->subjectTransformer);
            }

            return $this->errorBadRequest();
        } catch (Exception $e) {
            return $this->errorInternal($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteRequest $request)
    {
        try {
            $subject = $this->subjectRepository->delete($request->get('id'));
            if ($subject) {
                return $this->item($subject, new $this->subjectTransformer);
            }

            return $this->errorBadRequest();
        } catch (Exception $e) {
            return $this->errorInternal($e);
        }
    }
}
