<?php
class Controller {
    public function views($view, $data = []) {
        extract($data);
        require_once __DIR__ . '/../views/' . $view . '.php';
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