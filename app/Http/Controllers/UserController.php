<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteRequest;
use App\Http\Requests\UserRequest;
use App\Repository\UserRepository;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
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
            if (!$user->isEmpty()) {
                return $this->xhr($user);
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


            return $this->xhr($user);
        } catch (Exception $e) {
            return $this->xhr($e);
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
                return $this->xhr($user);
            } else {
                return $this->xhr('can\'t find data', 404);
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
            $user = $this->userRepository->delete($request->get('id'));

            return $this->xhr($user);
        } catch (Exception $e) {
            return $this->xhr($e, 500);
        }
    }
}
