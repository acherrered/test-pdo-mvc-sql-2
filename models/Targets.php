<?php
/*
DB update depending on the request
*/


class targets extends db{
	
	private function view_targets(){
		try {
			$SQL = "SELECT * FROM targets";
			$result = $this->connect()->prepare($SQL);
			$result->execute();
			return $result->fetchAll(PDO::FETCH_OBJ);	
		} catch (Exception $e) {
			die('Error targets(view_targets) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function get_view_targets(){
		return $this->view_targets();
	}

	private function register_targets($data){
		try {
			$SQL = 'INSERT INTO targets (name,family,identification,nationality) VALUES (?,?,?,?)';
			$result = $this->connect()->prepare($SQL);
      var_dump($password);
			$result->execute(array(
									$data['name'],
									$data['family'],
									$data['identification'],
									$data['nationality']
									)
							);			
		} catch (Exception $e) {
			die('Error targets(register_targets) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_register_target($data){
		$this->register_targets($data);
	}

	private function update_target($data){
		try {
			$SQL = 'UPDATE targets SET name = ?, family = ?, identification = ?, nationality = ? WHERE id_target = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									$data['name'],
									$data['family'],
									$data['identification'],
									$data['nationality'],
									$data['id']
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(update_targets) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_update_target($data){
		$this->update_target($data);
	}

	private function delete_target($id){
		try {
			$SQL = 'DELETE FROM targets WHERE id_target = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array($id));			
		} catch (Exception $e) {
			die('Error Administrator(delete_target) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_delete_target($id){
		$this->delete_target($id);
	}	
}


?>