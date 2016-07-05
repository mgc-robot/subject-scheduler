<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteRequest;
use App\Http\Requests\RoomRequest;
use App\Repository\RoomRepository;
use App\Transformers\RoomTransformer;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;

class RoomController extends BaseController
{

    protected $roomRepository;
    protected $roomTransformer;

    public function __construct(RoomRepository $roomRepository, RoomTransformer $roomTransformer)
    {
        $this->roomRepository = $roomRepository;
        $this->roomTransformer = $roomTransformer;
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
            $room = $this->roomRepository->paginate($limit);

            return $this->paginator($room, new $this->roomTransformer);
        } catch (Exception $e) {
            return $this->errorInternal($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoomRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        try {
            $data = [
                'room_no'   => $request->get('room_no'),
                'room_type' => $request->get('room_type')
            ];

            if ($request->has('id')) {
                $room = $this->roomRepository->update($data, $request->get('id'));
            } else {
                $room = $this->roomRepository->create($data);
            }

            return $this->item($room, new $this->roomTransformer);
        } catch (Exception $e) {
            return $this->errorInternal($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $room = $this->roomRepository->findBy('id', $id);
            if ($room) {
                return $this->item($room, new $this->roomTransformer);
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
            $room = $this->roomRepository->delete($request->get('id'));
            if ($room) {
                return $this->item($room, new $this->roomTransformer);
            }

            return $this->errorBadRequest();
        } catch (Exception $e) {
            return $this->errorInternal($e);
        }
    }
}
