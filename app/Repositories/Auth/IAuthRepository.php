<?php
namespace App\Repositories\Auth;

interface IAuthRepository {
    public function Login($request);
    public function Logout();
}
?>