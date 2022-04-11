<?php
/*
DB update depending on the request
*/
class Contacts extends db{
	
	private function view_contacts(){
		try {
			$SQL = "SELECT * FROM contacts";
			$result = $this->connect()->prepare($SQL);
			$result->execute();
			return $result->fetchAll(PDO::FETCH_OBJ);	
		} catch (Exception $e) {
			die('Error contacts(view_users) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function get_view_contacts(){
		return $this->view_contacts();
	}

	private function register_contacts($data){
		try {
			$SQL = 'INSERT INTO contacts (name,family_name,birthdate,identification,nationality) VALUES (?,?,?,?,?)';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									$data['name'],
									$data['family_name'],
									$data['birthdate'],
        				  $data['identification'],
                	$data['nationality']
									)
							);			
		} catch (Exception $e) {
			die('Error contacts(register_contacts) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_register_contact($data){
		$this->register_contacts($data);
	}

	private function update_contact($data){
		try {
			$SQL = 'UPDATE contacts SET name = ?, family_name = ?, birthdate = ?, identification = ?, nationality = ? WHERE id_contact = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									$data['name'],
									$data['family_name'],
									$data['birthdate'],
        				  $data['identification'],
                	$data['nationality'],
									$data['id']
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(update_contacts) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_update_contact($data){
		$this->update_contact($data);
	}

	private function delete_contact($id){
		try {
			$SQL = 'DELETE FROM contacts WHERE id_contact = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array($id));			
		} catch (Exception $e) {
			die('Error Administrator(delete_contacts) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_delete_contact($id){
		$this->delete_contact($id);
	}	
}
?>