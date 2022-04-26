<?php

  session_start();

  if (isset($_SESSION['admin_id'])) {
    header('Location: /php-login');
  }
  require 'models/db.php';


$db = db::connect();

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $db->prepare('SELECT id_admin, email, password FROM admins WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetchAll(PDO::FETCH_ASSOC);
//    var_dump($results);
    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['admin_id'] = $results['id_admin'];
      
      header("Location: /php-login");
      session_write_close();
    } else {
      $message = 'Sorry, those credentials do not match';
      var_dump($results);
    }
    var_dump($_POST['email']);
  }


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Login</h1>
    <span>or <a href="signup.php">SignUp</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Enter your email">
      <input name="password" type="password" placeholder="Enter your Password">
      <input type="submit" value="Submit">
    </form>
  </body>
</html>

