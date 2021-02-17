<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\IUserRepository;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Book;
// use Illuminate\Support\Facades\Auth;

class UserRepository implements IUserRepository
{
    public function Register($request)
    {
        try {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $plainPassword = $request->password;
            $user->password = app('hash')->make($plainPassword);

            $user->save();
            $token = JWTAuth::fromUser($user);
            return $token;
        } catch (\Exception $e) {
            return;
        }
    }

    public function Profile()
    {
        $profile_id = auth()->user()->id;
        $profile = User::with('books')->find($profile_id);
        return $profile;
    }

    public function AddBook($id)
    {
        $book = Book::find($id);
        if ($book->user_id === null) {
            $book->user_id = auth()->user()->id;
            $book->save();
            return $book;
        }
        return;
    }
}
