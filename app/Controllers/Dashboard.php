<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;

class Dashboard extends Controller
{
    /**
     * index function
     */
    public function index()
    {
        return view('layout/home');
    }


}