<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;

class Users extends Controller
{
    /**
     * index function
     */
    public function index()
    {
        //model initialize
        $postModel = new UsersModel();

        //pager initialize
        $pager = \Config\Services::pager();

        $data = array(
            'posts' => $postModel->paginate(2, 'users'),
            'pager' => $postModel->pager
        );

        return view('layout/loginViews', $data);
    }

    public function checkEmail()
    {
        $email = $this->request->getPost('email');

        $userModel = new UsersModel();
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            return $this->response->setJSON(['status' => 'exists']);
        } else {
            return $this->response->setJSON(['status' => 'available']);
        }
    }
}