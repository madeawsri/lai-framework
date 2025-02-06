<?php
namespace App\Modules\user;

use duncan3dc\Laravel\BladeInstance;

class UserCtrl {
    protected $blade;
    protected $router;

    public function __construct(BladeInstance $blade,$router) {
        $this->blade = $blade;
        $this->router = $router;
    }

    public function index() {
        // เปลี่ยนการเรียก view ให้ตรงกับ path
        echo $this->blade->render('user.views.home', [
            'title' => 'Welcome Home!'
        ]);
    }

    public function app() {
         // ดึงค่า module_name, module_view, params จาก Router
         $module_name = $this->router->getModuleName();
         $module_view = $this->router->getModuleView();
         $params = $this->router->getParams();
          // แสดงผลตามค่าเหล่านี้
        echo "Module Name: {$module_name}<br>";
        echo "Module View: {$module_view}<br>";
        echo "Params: " . implode(', ', $params) . "<br>";

        // เปลี่ยนการเรียก view ให้ตรงกับ path
        echo $this->blade->render('user.views.app', [
            'title' => 'Welcome Home!'
        ]);
    }
}
