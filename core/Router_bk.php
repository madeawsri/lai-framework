<?php
namespace Core;

class Router {
    protected $blade;

    public function __construct($blade) {
        $this->blade = $blade;
    }

    public function dispatch() {
        $path = $_GET['path'] ?? 'home';
        $segments = explode('/', trim($path, '/'));

        $module = $segments[0] ?? 'home';
        $method = $segments[1] ?? 'index';
        $params = array_slice($segments, 2);

        $controllerPath = __DIR__ . "/../App/Modules/{$module}/" . ucfirst($module) . "Ctrl.php";

        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $controllerName = "App\\Modules\\{$module}\\" . ucfirst($module) . "Ctrl";

            if (class_exists($controllerName)) {
                $controller = new $controllerName($this->blade); // ส่ง Blade ไปด้วย

                if (method_exists($controller, $method)) {
                    call_user_func_array([$controller, $method], $params);
                } else {
                    echo "ไม่พบ Method: {$method}";
                }
            } else {
                echo "ไม่พบ Controller.";
            }
        } else {
            echo "404 - ไม่พบหน้า.";
        }
    }
}
