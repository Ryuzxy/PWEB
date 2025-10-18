<?php
class Controller {
    public function views($view, $data = []) {
        $viewPath = __DIR__ . '/../views/' . strtolower($view) . '.php';

        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            die("❌ View '$view' tidak ditemukan di: $viewPath");
        }
    }
    public function models($model) {
        require_once __DIR__ . '/../models/' . $model . '.php';
        return new $model;
    }
    public function redirect($url) {
        header('Location: ' . $url);
        exit;
    }
}