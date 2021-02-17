<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Repositories\User\IUserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepo;

    public function __construct(IUserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
        $this->middleware('auth', ['except' => ['register']]);
    }

    public function register(Request $request)
    {
        $user = $this->userRepo->Register($request);

        return response()->json(compact('user'));
    }

    public function profile() {
        $user = $this->userRepo->Profile();

        return response()->json(compact('user'));
    }

    public function addbook($id) {
        $book = $this->userRepo->AddBook($id);

        return response()->json(compact('book'));
    }

}
