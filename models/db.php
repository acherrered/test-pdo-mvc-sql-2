<?php
/*
	CRUD creado por Oscar Amado
	Contacto: oscarfamado@gmail.com
*/

class db{	
	public function connect(){
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

  $res = $connect->exec(
    "CREATE TABLE IF NOT EXISTS missions (
    id_mission INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT, 
    discription TEXT,
    identification TEXT,
    country TEXT,
    type TEXT,
    agent TEXT,
    target TEXT,
    status TEXT,
    speciality TEXT,
    start_date TEXT,
    end_date TEXT
    )"
  );

    $res = $connect->exec(
    "CREATE TABLE IF NOT EXISTS missionsspec (
    id_missionspec INTEGER PRIMARY KEY AUTOINCREMENT,
    id_mission INTEGER,
    id_agent INTEGER,
    id_contact INTEGER,
    id_hideout INTEGER,
    id_target INTEGER
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
    identification TEXT,
    type TEXT
    )"
    );

  $res = $connect->exec(
    "CREATE TABLE IF NOT EXISTS admins (
    id_admin INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    family TEXT,
    date TEXT,
    email TEXT,
    password TEXT
    )"
  );

    $res = $connect->exec(
    "CREATE TABLE IF NOT EXISTS targets (
    id_target INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT,
    family TEXT,
    identification TEXT,
    nationality TEXT
    )"
  );
      
  return $connect;
      
		} catch (Exception $e) {
			die('Error db(connect) '.$e->getMessage());
		}
	}
}
?>