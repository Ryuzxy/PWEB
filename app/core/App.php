<?php
class App {
    protected $controller = 'LoginController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseURL();

        // 1️⃣ Tentukan controller
        $controllerName = isset($url[0]) ? ucfirst($url[0]) . 'Controller' : $this->controller;
        $controllerPath = __DIR__ . '/../controllers/' . $controllerName . '.php';

        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $this->controller = new $controllerName;
            unset($url[0]);
        } else {
            // Jika tidak ada, fallback ke LoginController
            require_once __DIR__ . '/../controllers/LoginController.php';
            $this->controller = new LoginController();
        }

        // 2️⃣ Tentukan method
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // 3️⃣ Parameter tambahan
        $this->params = $url ? array_values($url) : [];

        // 4️⃣ Jalankan controller & method
        try {
            call_user_func_array([$this->controller, $this->method], $this->params);
        } catch (Throwable $e) {
            http_response_code(500);
            echo "<h3>Terjadi kesalahan:</h3>";
            echo "<pre>{$e->getMessage()}</pre>";
        }
    }

    private function parseURL() {
    if (isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', strtolower($url)); // 🔹 lowercase semua
        return $url;
    }
    return [];
}
}
