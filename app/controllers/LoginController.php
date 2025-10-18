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

            header('Location: /dashboard');
            exit;
        } else {
            $error = "Username atau password salah.";
            $this->views('LoginUser/Login', ['error' => $error]);
        }
    }

    public function logout()
    {
        // Hapus semua data session dengan aman
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params['path'], $params['domain'],
                $params['secure'], $params['httponly']
            );
        }
        session_destroy();

        header('Location: /login');
        exit;
    }
}
