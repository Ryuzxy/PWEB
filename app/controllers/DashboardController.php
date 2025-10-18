<?php
require_once __DIR__ . '/../core/Controller.php';

class DashboardController extends Controller {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
    }

    public function index() {
        $data['username'] = $_SESSION['user'];
        $this->views('Homepage/Dashboard', $data);
    }
}
