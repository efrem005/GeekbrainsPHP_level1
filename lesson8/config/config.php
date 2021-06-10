<?php
define('TEMPLATES_DIR', '../templates/');
define('LAYOUTS_DIR', '../templates/layouts/');
define('ROOT', dirname(__DIR__));

// DB CONFIG
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', 'root');
define('DB', 'shopphp');

include(ROOT . '/engine/db.php');
include(ROOT . '/engine/controller.php');
include(ROOT . '/engine/functions.php');
include(ROOT . '/engine/auth.php');
include(ROOT . '/engine/catalog.php');
include(ROOT . '/engine/product.php');
include(ROOT . '/engine/admin_panel.php');