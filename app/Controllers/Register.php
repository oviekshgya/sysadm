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

    public function store()
    {
        // Validasi form input
        if ($this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ])) {
            // Ambil input dari form
            $data = [
                'nameUser' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];

            // Simpan data ke database menggunakan model
            $userModel = new UsersModel();
            $userModel->save($data);

            // Redirect atau beri pesan sukses
            session()->setFlashdata('success', 'User berhasil ditambahkan!');
            return redirect()->to('/')->with('success', 'User created successfully!');
        } else {
            // Jika validasi gagal, kembalikan ke form dengan pesan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }
}