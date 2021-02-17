<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Auth\IAuthRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(IAuthRepository $userRepo)
    {
        $this->userRepo = $userRepo;
        $this->middleware('auth', ['except' => ['login']]);
    }

    public function login(Request $request) {
        $token =  $this->userRepo->Login($request);

        return response()->json(compact('token'));
    }

    public function profile() {
        $profile = $this->userRepo->Profile();
        
        return response()->json($profile);
    }

    // public function register(Request $request)
    // {
    //     $user = $this->userRepo->addUser($request);

    //     return response()->json([
    //         "data" => $user
    //     ]);
    // }

    // public function update($id, Request $request)
    // {
    //     $user =  $this->userRepo->updateUser($id, $request);

    //     return response()->json([
    //         "data" => $user
    //     ]);
    // }

    // public function delete($id)
    // {
    //     $user = $this->userRepo->deleteUser($id);

    //     return response()->json([
    //         "data" => $user
    //     ]);
    // }
}
