<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteRequest;
use App\Http\Requests\RoomRequest;
use App\Repository\RoomRepository;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;

class RoomController extends BaseController
{

    protected $roomRepository;

    public function __construct(RoomRepository $roomRepository)
    {
        $this->roomRepository = $roomRepository;
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
            $limit = $request->get('limit') ?: '15';
            $room = $this->roomRepository->paginate($limit);
            if (!$room->isEmpty()) {
                return response()->json($room, true);
            } else {
                return response()->json('No data found.', 404);
            }
        } catch (Exception $e) {
            return response()->json($e, 500);
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

            return response()->json($room);
        } catch (Exception $e) {
            return response()->json($e, 500);
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
                return response()->json($room);
            } else {
                return response()->json('can\'t find data', 404);
            }
        } catch (Exception $e) {
            return response()->json($e, 500);
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
            return response()->json($this->roomRepository->delete($request->get('id')));
        } catch (Exception $e) {
            return response()->json($e, 500);
        }
    }
}
