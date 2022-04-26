<?php
/*
DB update depending on the request
*/


class admins extends db{
	
	private function view_admins(){
		try {
			$SQL = "SELECT * FROM admins";
			$result = $this->connect()->prepare($SQL);
			$result->execute();
			return $result->fetchAll(PDO::FETCH_OBJ);	
		} catch (Exception $e) {
			die('Error admins(view_admins) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function get_view_admins(){
		return $this->view_admins();
	}

	private function register_admins($data){
		try {
			$SQL = 'INSERT INTO admins (name,family,date,email,password) VALUES (?,?,?,?,?)';
			$result = $this->connect()->prepare($SQL);
      $password = password_hash($data['password'], PASSWORD_BCRYPT);
      var_dump($password);
			$result->execute(array(
									$data['name'],
									$data['family'],
									$data['date'],
									$data['email'],
									//$data[$password]
                  $password
									)
							);			
		} catch (Exception $e) {
			die('Error admins(register_admins) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_register_admin($data){
		$this->register_admins($data);
	}

	private function update_admin($data){
		try {
			$SQL = 'UPDATE admins SET name = ?, family = ?, date = ?, email = ?, password = ? WHERE id_admin = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									$data['name'],
									$data['family'],
									$data['date'],
									$data['email'],
									$data['password'],
									$data['id']
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(update_admins) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_update_admin($data){
		$this->update_admin($data);
	}

	private function delete_admin($id){
		try {
			$SQL = 'DELETE FROM admins WHERE id_admin = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array($id));			
		} catch (Exception $e) {
			die('Error Administrator(delete_admin) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_delete_admin($id){
		$this->delete_admin($id);
	}	
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    //echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
//debug_to_console("Test");
?>