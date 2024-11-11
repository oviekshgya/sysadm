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

    public function login()
    {
        helper(['form', 'url']);
        
        $session = session();
        $model = new UsersModel();
        
        // Ambil inputan dari form login
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        // Validasi input
        if (!$this->validate([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ])) {
            $session->setFlashdata('error', 'email/password tidak ditemukan!');
            return redirect()->back();
        }

        // Cari pengguna berdasarkan email
        $user = $model->getUserByEmail($email);

        // Jika pengguna ditemukan dan password cocok
        if ($user && password_verify($password, $user['password'])) {
            // Simpan data pengguna ke session
            $session->set('id', $user['id']);
            $session->set('email', $user['email']);
            
            return redirect()->to('/dashboard');
        } else {
            $session->setFlashdata('error', 'email/password');
            return redirect()->back();
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('user_id');
        $session->remove('username');
        
        return redirect()->to('/');
    }
}