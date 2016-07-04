<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteRequest;
use App\Http\Requests\SubjectRequest;
use App\Repository\SubjectRepository;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;

class SubjectController extends BaseController
{

    protected $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
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
            $limit = $request->get('limit') ?: 15;
            $subject = $this->subjectRepository->paginate($limit);
            if (!$subject->isEmpty()) {
                return $this->xhr($subject, true);
            } else {
                return $this->xhr('No data found.', 404);
            }
        } catch (Exception $e) {
            return $this->xhr($e, 500);
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

            return $this->xhr($subject);
        } catch (Exception $e) {
            return $this->xhr($e, 500);
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
                return $this->xhr($subject);
            } else {
                return $this->xhr('cant\'t find data', 404);
            }
        } catch (Exception $e) {
            return $this->xhr($e, 500);
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

            return $this->xhr($subject);
        } catch (Exception $e) {
            return $this->xhr($e, 500);
        }
    }
}
