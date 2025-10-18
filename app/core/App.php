<?php
class App {
    protected $controller = 'PendaftaranController';
    protected $method = 'form';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();

        // 1️⃣ Tentukan controller
        if (isset($url[0]) && file_exists('../app/controllers/' . ucfirst($url[0]) . 'Controller.php')) {
            $this->controller = ucfirst($url[0]) . 'Controller';
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // 2️⃣ Tentukan method
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // 3️⃣ Parameter tambahan
        $this->params = $url ? array_values($url) : [];

        // 4️⃣ Jalankan controller & method
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseURL() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return []; // pastikan mengembalikan array kosong agar tidak error
    }
}
