<?php

class signup extends db{
  	private function view_login(){
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $connect->prepare('SELECT id, email, password FROM admins WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    }
return $results;
  }
}


function get_login(){
return $this->view_login();
	}

?>
