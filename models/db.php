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
     
  $res = $connect->exec(
       "CREATE TABLE IF NOT EXISTS agents (
    id_agent INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT, 
    family_name TEXT,
    birthdate TEXT,
    identification TEXT,
    nationality TEXT,
    speciality TEXT
    )"
    );

  $res = $connect->exec(
       "CREATE TABLE IF NOT EXISTS contacts (
    id_contact INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT, 
    family_name TEXT,
    birthdate TEXT,
    identification TEXT,
    nationality TEXT
    )"
    );
      
  $res = $connect->exec(
       "CREATE TABLE IF NOT EXISTS hideouts (
    id_hideout INTEGER PRIMARY KEY AUTOINCREMENT,
    address TEXT, 
    country TEXT,
    identificatiob TEXT
    )"
    );
      
  return $connect;
      
		} catch (Exception $e) {
			die('Error db(connect) '.$e->getMessage());
		}
	}
}
?>