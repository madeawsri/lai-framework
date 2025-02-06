# lai-framework
Lai Framework เป็น PHP framework ขนาดเล็กและเร็วที่พัฒนาโดยใช้แนวคิดของความเรียบง่ายและประสิทธิภาพสูง

# Lai Framework

**Lai Framework** is a small, fast, and lightweight PHP framework designed for simplicity and performance. It allows developers to build web applications with minimal setup and effort while maintaining flexibility and scalability.

## Features

- **Fast and Lightweight**: Built for speed and efficiency, reducing unnecessary processing.
- **Modular Structure**: Organize your app in modules, making it easy to extend without affecting core logic.
- **Easy Routing**: Simple routing system that handles HTTP requests and maps them to appropriate controllers.
- **Blade Templating Engine**: Uses Blade for easy view management, layouts, partials, and components.
- **Helper Functions**: Provides commonly used functions to simplify your codebase.

## Directory Structure
<pre>
demo/
├── index.php                # Entry point for the application
├── .htaccess                # URL rewrite configuration (for Apache)
├── core/
│   └── Router.php           # Router for dispatching routes
├── helpers/
│   └── Utility.php          # Utility functions for general use
├── App/
│   └── Modules/
│       └── home/
│           ├── HomeCtrl.php   # Controller for Home module
│           └── views/
│               └── home.blade.php # View for Home module
└── resources/
    ├── views/
    │   ├── layouts/
    │   │   └── app.blade.php  # Main layout for all pages
    │   ├── parts/             # Partials (e.g., header, footer)
    │   ├── components/        # Reusable components (e.g., alerts, cards)
    └── cache/                  # Blade cache directory
</pre>

### Explanation:

- `index.php`: เป็นไฟล์ที่เริ่มต้นโปรเจคและจะทำหน้าที่ในการเรียกใช้งาน Router เพื่อจัดการ Routing
- `.htaccess`: ไฟล์ตั้งค่าการ Rewrite URL ถ้าใช้ Apache
- `core/Router.php`: ควบคุมการ Route และการเรียก Controller
- `helpers/Utility.php`: ฟังก์ชันที่ใช้ช่วยในโปรเจคทั่วไป
- `App/Modules/home/`: โมดูลสำหรับ `home` ซึ่งประกอบด้วย Controller และ View
- `resources/views/`: โฟลเดอร์ที่เก็บ Blade templates
    - `layouts/`: Layout หลักของทุกๆ หน้า
    - `parts/`: Partial views เช่น header, footer
    - `components/`: Components ที่สามารถใช้ซ้ำได้ เช่น alert, card
    - `cache/`: ที่เก็บ Cache ของ Blade


