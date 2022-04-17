<?php

require 'models/db.php';


  $message = '';

class signup extends db{
  private function sig(){
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO admins (email, password, family, name, date) VALUES (:email, :password :family, :name, :date)";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);    
    $stmt->bindParam(':family', $_POST['family']);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':date', $_POST['date']);


    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
}
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message; ?></p>
    <?php endif; ?>

    <h1>SignUp</h1>
    <span>or <a href="login.php">Login</a></span>

    <form action="signup.php" method="POST">
      <input name="name" type="text" placeholder="Enter your name">
      <input name="family" type="text" placeholder="Enter your family name">
      <input name="date" type="text" placeholder="Enter your date">
      <input name="email" type="text" placeholder="Enter your email">
      <input name="password" type="password" placeholder="Enter your Password">
      <input name="confirm_password" type="password" placeholder="Confirm Password">
      <input type="submit" value="Submit">
    </form>

  </body>
</html>
