<?php
/*
	CRUD creado por Oscar Amado
	Contacto: oscarfamado@gmail.com
*/


class db{	
	protected function connect(){
		try {
			//$connect = new PDO('mysql:host=0.0.0.0;port=80;dbname=crud_mvc_pdo;charset=utf8;','root','');
		//	$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

       $connect = new PDO('sqlite:database.sqlite');
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $res = $connect->exec(
    "CREATE TABLE IF NOT EXISTS users (
    id_user INTEGER PRIMARY KEY AUTOINCREMENT,
    name_user TEXT, 
    last_name_user TEXT,
    email_user
    )"
  );
 //$connect = null;     
	return $connect;	
      
		} catch (Exception $e) {
			die('Error db(connect) '.$e->getMessage());
		}
	}
}
?>