<?php
require_once __DIR__ . '/../core/Controller.php';

class LoginController extends Controller {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // pastikan session aktif dari awal
        }
    }

    public function index() {
        $this->views('LoginUser/Login');
    }

    public function auth() {
        $model = $this->models('UserModel');
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($model->login($username, $password)) {
            $_SESSION['user'] = $username;

            // 🔹 redirect pakai huruf kecil sesuai route App.php
            header('Location: /dashboard');
            exit;
        } else {
            $error = "Username atau password salah.";
            $this->views('LoginUser/Login', ['error' => $error]);
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }
}
