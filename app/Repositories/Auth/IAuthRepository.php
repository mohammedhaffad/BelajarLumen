<?php
namespace App\Repositories\Auth;

interface IAuthRepository {
    public function Login($request);
    public function Register($request);
    public function Logout();
    public function Profile();
}
?>