<?php

 session_start();
 //session_write_close();
require_once 'core/core.php';

 $db = db::connect();



  if (isset($_SESSION['admin_id'])) {
    $records = $db->prepare('SELECT id_admin, email, password FROM admins WHERE id_admin = :id');
    $records->bindParam(':id', $_SESSION['admin_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $admin = null;

    if (count($results) > 0) {
      $admin = $results;

    }
  }

    
   
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome to you WebApp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!--<link rel="stylesheet" href="assets/css/style.css">-->
  </head>
  <body>
    <?php require 'partials/header.php' ?>
    <?php if(!empty($admin)): ?>
      <br> Welcome. <?= $admin['email']; ?>
      <br>You are Successfully Logged In

<?php

          $c = isset($_GET['c']) ? $_GET['c'] : 'administrator';
//$c = 'administratorController';
$m = isset($_GET['m']) ? $_GET['m'] : 'index';
$c .= 'Controller';
//var_dump($m, $c);
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

?>


    
<?php else: ?>
      <h1>Please Login or SignUp</h1>

      <a href="login.php">Login</a> or
      <a href="signup.php">SignUp</a>
    <?php endif; ?>
  </body>
</html>
