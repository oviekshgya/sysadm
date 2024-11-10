<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;

class Register extends Controller
{
    /**
     * index function
     */
    public function index()
    {
        return view('layout/registerViews');
    }

    public function forgotPassword()
    {
        return view('layout/forgotPasswordViews');
    }
}