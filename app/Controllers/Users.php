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

    public function getHeaderUser($idRole)
    {
        // Inisialisasi model
        $userModel = new UsersModel();

        if ($idRole === "1"){
            $users = $userModel->where('idRole', 0)->findAll();
             return $this->response->setJSON($users);
        }else if ($idRole === "3"){
             $users = $userModel->where('idRole', 2)->findAll();
             return $this->response->setJSON($users);
        }else if ($idRole === '4'){
            $users = $userModel->where('idRole', 3)->findAll();
             return $this->response->setJSON($users);
        }else{
            $users = $userModel->where('idRole', 0)->findAll();
             return $this->response->setJSON($users);
        }

       
    }
}