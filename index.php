<?php

session_start();
?>
<a href="https://oauth.vk.com/authorize?client_id=6000953&display=page&redirect_uri=http://forum/vk-callback&response_type=code&v=5.63&scope=email"target="_blank">Логин через ВК</a>
<?php
define('APP_MODE', 'DEBUG');
define('SITE_ROOT', realpath(dirname(__FILE__)));
require __DIR__ . '/vendor/autoload.php';

//spl_autoload_register( function ($class_name) {
//    var_dump(  $class_name );
////    exit();
//    include $class_name . '.php';
//});

use App\Framework\App;
$app = new App();
$app->run();
/*(new App())->run();
*/
