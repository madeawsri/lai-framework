<?php
// เรียกใช้ autoload ที่ถูกสร้างจาก Composer
require_once __DIR__ . '/../vendor/autoload.php';

use Core\Router;
use duncan3dc\Laravel\BladeInstance;

// กำหนด path สำหรับ views และ cache
$viewsPath = __DIR__ . '/../resources/views';      // Layout หลัก
$modulesPath = __DIR__ . '/../App/Modules';       // Views ของแต่ละ Module
$cache = __DIR__ . '/../resources/cache';         // Cache path

// สร้าง instance ของ Blade
$blade = new BladeInstance($viewsPath, $cache);  
$blade->addPath($modulesPath); // เพิ่มพาธของ Module ไปด้วย

// สร้าง instance ของ Router
$router = new Router($blade);
