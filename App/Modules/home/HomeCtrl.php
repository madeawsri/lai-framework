<?php
namespace App\Modules\home;

use duncan3dc\Laravel\BladeInstance;

class HomeCtrl {
    private $blade;

    public function __construct(BladeInstance $blade) {
        $this->blade = $blade;
    }

    public function index() {
        // เปลี่ยนการเรียก view ให้ตรงกับ path
        echo $this->blade->render('home.views.home', [
            'title' => 'Welcome Home!'
        ]);
    }

    public function app() {
        // เปลี่ยนการเรียก view ให้ตรงกับ path
        echo $this->blade->render('home.views.app', [
            'title' => 'Welcome Home!'
        ]);
    }
}
