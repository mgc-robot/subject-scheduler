<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteRequest;
use App\Http\Requests\UserRequest;
use App\Repository\UserRepository;
use App\Transformers\UserTransformer;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{

    protected $userRepository;
    protected $userTransformer;

    public function __construct(UserRepository $userRepository, UserTransformer $userTransformer)
    {
        $this->userRepository = $userRepository;
        $this->userTransformer = $userTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user = $this->userRepository->all();

            return $this->collection($user, new $this->userTransformer);
        } catch (Exception $e) {
            return $this->errorInternal($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            $data =
                [
                    'username'   => $request->get('username'),
                    'last_name'  => $request->get('last_name'),
                    'first_name' => $request->get('first_name'),
                    'email'      => $request->get('email')
                ];


            if ($request->has('id')) {
                $user = $this->userRepository->update($data, $request->get('id'));
            } else {
                $data['password'] = Hash::make($request->get('password'));
                $user = $this->userRepository->create($data);
            }


            return $this->item($user, new $this->userTransformer);
        } catch (Exception $e) {
            return $this->errorInternal($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $username
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        try {
            $user = $this->userRepository->findBy('username', $username);
            if ($user) {
                return $this->item($user, new $this->userTransformer);
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
            $user = $this->userRepository->delete($request->get('id'));
            if ($user) {
                return $this->item($user, new $this->userTransformer);
            }

            return $this->errorBadRequest();
        } catch (Exception $e) {
            return $this->errorInternal($e);
        }
    }
}
