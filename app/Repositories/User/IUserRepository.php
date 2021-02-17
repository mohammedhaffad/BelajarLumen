<?php

namespace App\Repositories\User;

interface IUserRepository {
    public function Register($request);
    public function Profile();
    public function AddBook($id); 
}

?>