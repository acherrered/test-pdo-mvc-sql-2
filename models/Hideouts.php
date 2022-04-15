<?php
/*
DB update depending on the request
*/
class Hideouts extends db{
	
	private function view_hideouts(){
		try {
			$SQL = "SELECT * FROM hideouts";
			$result = $this->connect()->prepare($SQL);
			$result->execute();
			return $result->fetchAll(PDO::FETCH_OBJ);	
		} catch (Exception $e) {
			die('Error hideouts(view_hideouts) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function get_view_hideouts(){
		return $this->view_hideouts();
	}

	private function register_hideouts($data){
		try {
			$SQL = 'INSERT INTO hideouts (address,country,identification,type) VALUES (?,?,?,?)';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									$data['address'],
									$data['country'],
									$data['identification'],
									$data['type']
									)
							);			
		} catch (Exception $e) {
			die('Error hideouts(register_hideouts) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_register_hideout($data){
		$this->register_hideouts($data);
	}

	private function update_hideout($data){
		try {
			$SQL = 'UPDATE hideouts SET address = ?, country = ?, identification = ?, type = ? WHERE id_hideout = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									$data['address'],
									$data['country'],
									$data['identification'],
									$data['type'],
									$data['id']
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(update_hideouts) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_update_hideout($data){
		$this->update_hideout($data);
	}

	private function delete_hideout($id){
		try {
			$SQL = 'DELETE FROM hideouts WHERE id_hideout = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array($id));			
		} catch (Exception $e) {
			die('Error Administrator(delete_hideout) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_delete_hideout($id){
		$this->delete_hideout($id);
	}	
}
?>