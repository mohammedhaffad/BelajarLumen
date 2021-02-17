<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\Auth\IAuthRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $autRepo;

    public function __construct(IAuthRepository $autRepo)
    {
        $this->autRepo = $autRepo;
        $this->middleware('auth', ['except' => ['login']]);
    }

    public function login(Request $request) {
        $token =  $this->autRepo->Login($request);

        return response()->json(compact('token'));
    }

    public function logout() {
        $logout = $this->autRepo->Logout();

        return response()->json(compact('logout'));
    }


    // public function register(Request $request)
    // {
    //     $user = $this->autRepo->addUser($request);

    //     return response()->json([
    //         "data" => $user
    //     ]);
    // }

    // public function update($id, Request $request)
    // {
    //     $user =  $this->autRepo->updateUser($id, $request);

    //     return response()->json([
    //         "data" => $user
    //     ]);
    // }

    // public function delete($id)
    // {
    //     $user = $this->autRepo->deleteUser($id);

    //     return response()->json([
    //         "data" => $user
    //     ]);
    // }
}
