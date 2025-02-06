<?php 
namespace Core;

class Router {
    protected $blade;

    public $module_name;
    public $module_view;
    public $params;

    public function __construct($blade) {
        $this->blade = $blade;
    }

    public function dispatch() {
        // ดึงค่า path จาก URL
        $path = $_GET['path'] ?? 'home';
        $segments = explode('/', trim($path, '/'));

        // กำหนดค่า module_name, module_view, params
        $this->module_name = $segments[0] ?? 'home';
        $this->module_view = $this->module_name . '.' . ($segments[1] ?? 'index');
        $this->params = array_slice($segments, 2);

        // Path ของ Controller
        $controllerPath = __DIR__ . "/../App/Modules/{$this->module_name}/" . ucfirst($this->module_name) . "Ctrl.php";

        // ตรวจสอบว่ามีไฟล์ Controller หรือไม่
        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            $controllerName = "App\\Modules\\{$this->module_name}\\" . ucfirst($this->module_name) . "Ctrl";

            // ตรวจสอบว่า Class ของ Controller มีอยู่หรือไม่
            if (class_exists($controllerName)) {
                $controller = new $controllerName($this->blade, $this); // ส่ง Router ไปให้ Controller

                // ดึงค่าจาก Router ไปใช้ใน Controller
                $method = $segments[1] ?? 'index';
                if (method_exists($controller, $method)) {
                    call_user_func_array([$controller, $method], $this->params);
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

    // ฟังก์ชันเพื่อให้ Controller เข้าถึงค่าต่างๆ
    public function getModuleName() {
        return $this->module_name;
    }

    public function getModuleView() {
        return $this->module_view;
    }

    public function getParams() {
        return $this->params;
    }
}
