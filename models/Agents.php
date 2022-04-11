<?php
/*
DB update depending on the request
*/
class Agents extends db{
	
	private function view_agents(){
		try {
			$SQL = "SELECT * FROM agents";
			$result = $this->connect()->prepare($SQL);
			$result->execute();
			return $result->fetchAll(PDO::FETCH_OBJ);	
		} catch (Exception $e) {
			die('Error agents(view_users) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function get_view_agents(){
		return $this->view_agents();
	}

	private function register_agents($data){
		try {
			$SQL = 'INSERT INTO agents (name,family_name,birthdate,identification,nationality,speciality) VALUES (?,?,?,?,?,?)';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									$data['name'],
									$data['family_name'],
									$data['birthdate'],
        				  $data['identification'],
                	$data['nationality'],
                	$data['speciality']
									)
							);			
		} catch (Exception $e) {
			die('Error agents(register_agents) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_register_agent($data){
		$this->register_agents($data);
	}

	private function update_agent($data){
		try {
			$SQL = 'UPDATE agents SET name = ?, family_name = ?, birthdate = ?, identification = ?, nationality = ?, speciality = ? WHERE id_agent = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									$data['name'],
									$data['family_name'],
									$data['birthdate'],
        				  $data['identification'],
                	$data['nationality'],
                	$data['speciality'],
									$data['id']
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(update_agents) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_update_agent($data){
		$this->update_agent($data);
	}

	private function delete_agent($id){
		try {
			$SQL = 'DELETE FROM agents WHERE id_agent = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array($id));			
		} catch (Exception $e) {
			die('Error Administrator(delete_agents) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_delete_agent($id){
		$this->delete_agent($id);
	}	
}
?>