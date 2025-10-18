<?php
require_once __DIR__ . '/../core/Controller.php';

class RegisterController extends Controller {
    public function index() {
        $this->views('LoginUser/Register');
    }

    public function store() {
        $model = $this->models('UserModel');
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($model->register($username, $password)) {
            header('Location: /login');
            exit;
        } else {
            $error = "Gagal mendaftarkan akun.";
            $this->views('LoginUser/Register', ['error' => $error]);
        }
    }
}
