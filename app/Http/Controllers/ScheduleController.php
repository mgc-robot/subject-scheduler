<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteRequest;
use App\Http\Requests\ScheduleRequest;
use App\Repository\ScheduleRepository;
use App\Transformers\ScheduleTransformer;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends BaseController
{

    protected $scheduleRepository;
    protected $scheduleTransformer;

    public function __construct(ScheduleRepository $scheduleRepository, ScheduleTransformer $scheduleTransformer)
    {
        $this->scheduleRepository = $scheduleRepository;
        $this->scheduleTransformer = $scheduleTransformer;
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
            $schedule = $this->scheduleRepository->with('instructors', 'subjects', 'rooms')->paginate($limit);
            if (!$schedule->isEmpty()) {
                return $this->collection($schedule, new $this->scheduleTransformer);
            }

            return $this->errorBadRequest();
        } catch (Exception $e) {
            return $this->errorInternal($e);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param ScheduleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request)
    {
        try {
            $data =
                [
                    'instructor_id' => $request->get('instructor_id'),
                    'subject_id'    => $request->get('subject_id'),
                    'room_id'       => $request->get('room_id'),
                    'from_time'     => $request->get('from_time'),
                    'to_time'       => $request->get('to_time'),
                    'day'           => $request->get('day')

                ];
            if ($request->has('id')) {
                $data['updated_by'] = Auth::user()->id;
                $schedule = $this->scheduleRepository->update($data, $request->get('id'));
            } else {
                $data['created_by'] = Auth::user()->id;
                $schedule = $this->scheduleRepository->create($data);
            }

            return $this->item($schedule, new $this->scheduleTransformer);
        } catch (Exception $e) {
            return $this->erorrInternal($e);
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
            $schedule = $this->scheduleRepository->with('instructors', 'subjects', 'rooms')->where('id', '=',
                $id)->get();
            if (!$schedule->isEmpty()) {
                return $this->item($schedule, new $this->scheduleTransformer);
            } else {
                return $this->errorBadRequest();
            }
        } catch (Exception $e) {
            return $this->erorrInternal($e);
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
            $schedule = $this->scheduleRepository->delete($request->get('id'));

            if ($schedule) {
                return $this->item($schedule, new $this->scheduleTransformer);
            }

            return $this->errorBadRequest();
        } catch (Exception $e) {
            return $this->erorrInternal($e);
        }
    }
}
