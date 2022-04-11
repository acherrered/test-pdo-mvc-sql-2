<?php
require_once 'core/core.php';

$c = isset($_GET['c']) ? $_GET['c'] : 'administrator';
//$c = 'administratorController';
$m = isset($_GET['m']) ? $_GET['m'] : 'index';
$c .= 'Controller';
var_dump($m, $c);
if (file_exists('controllers/' . $c . '.php')) {
    require_once 'controllers/' . $c . '.php';
    if (method_exists($c, $m)) {
      $c = new $c;
        call_user_func([$c, $m]);
    } else {
        die("Error : El metodo o funcion [{$m}()] no existe");
    }
} else {
    die("Error : El controlador [{$c}] no existe.");
}


/*//$c = isset($_GET['c']) ? $_GET['c'] : 'administrator';
$ac = 'agentsController';
$am = isset($_GET['am']) ? $_GET['am'] : 'agents';
//$c .= 'Controller';
var_dump($am, $ac);
if (file_exists('controllers/' . $ac . '.php')) {
    require_once 'controllers/' . $ac . '.php';
    if (method_exists($ac, $am)) {
      $ac = new $ac;
        call_user_func([$ac, $am]);
    } else {
        die("Error : El metodo o funcion [{$am}()] no existe");
    }
} else {
    die("Error : El controlador [{$ac}] no existe.");
}

/*

*/
