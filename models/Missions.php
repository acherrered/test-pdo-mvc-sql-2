<?php
/*
DB update depending on the request
*/


class Missions extends db{
	

	private function view_missions(){
		try {
      
      $SQL = "SELECT M.*, GROUP_CONCAT(A.name) AS agent_name, GROUP_CONCAT(A.family_name) AS agent_family_name  
FROM missions AS M
LEFT JOIN missionsspec AS MS ON MS.id_mission=M.id_mission
LEFT JOIN agents AS A ON MS.id_agent=A.id_agent
GROUP BY M.id_mission
      ";
			$result = $this->connect()->prepare($SQL);
			$result->execute();
			return $result->fetchAll(PDO::FETCH_OBJ);	

		} catch (Exception $e) {
			die('Error missions(view_missions) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function get_view_missions(){
		return $this->view_missions();
	}

	private function register_missions($data){
		try {

      // Ajouter la mission
			$SQL = 'INSERT INTO missions (title,discription,identification,country,type,status,speciality,start_date,end_date) VALUES (?,?,?,?,?,?,?,?,?)';
      $db = $this->connect();
			$result = $db->prepare($SQL);
      //var_dump($password);
			$result->execute(array(
									$data['title'],
									$data['discription'],
									$data['identification'],
									$data['country'],
									$data['type'],
									$data['status'],
									$data['speciality'],
									$data['start_date'],
									$data['end_date']
									)
							);
      
        $last_id =  $db->lastInsertId();
          // Ajouter les agents
        if(!empty($data["agents"])) {
           var_dump($data['agents']);
           var_dump($last_id);
          $SQL = 'INSERT INTO missionsspec (id_mission, id_agent) VALUES (?, ?)';
    			$result = $this->connect()->prepare($SQL);

          $data['agents'] = explode(",", $data['agents']);
          foreach($data['agents'] as $agent_id) {
    			  $result->execute(array($last_id, $agent_id));
          }
        }

              if(!empty($data["contacts"])) {
           var_dump($data['contacts']);
           var_dump($last_id);
          $SQL = 'INSERT INTO missionsspec (id_mission, id_contact) VALUES (?, ?)';
    			$result = $this->connect()->prepare($SQL);

          $data['contacts'] = explode(",", $data['contacts']);
          foreach($data['contacts'] as $contact_id) {
    			  $result->execute(array($last_id, $contact_id));
          }
        }

              if(!empty($data["targets"])) {
           var_dump($data['targets']);
           var_dump($target_id);
          $SQL = 'INSERT INTO missionsspec (id_mission, id_target) VALUES (?, ?)';
    			$result = $this->connect()->prepare($SQL);

          $data['targets'] = explode(",", $data['targets']);
          foreach($data['targets'] as $target_id) {
    			  $result->execute(array($last_id, $target_id));
          }
        }
           
        // Ajouter les planques

                    if(!empty($data["hideouts"])) {
           var_dump($data['hideouts']);
           var_dump($hideout_id);
          $SQL = 'INSERT INTO missionsspec (id_mission, id_hideout) VALUES (?, ?)';
    			$result = $this->connect()->prepare($SQL);

          $data['hideouts'] = explode(",", $data['hideouts']);
          foreach($data['hideouts'] as $hideout_id) {
    			  $result->execute(array($last_id, $hideout_id));
          }
        }

       
		} catch (Exception $e) {
			die('Error missions(register_missions) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}
  

	function set_register_mission($data){
		$this->register_missions($data);
	}

	private function update_mission($data){
		try {
			$SQL = 'UPDATE missions SET title = ?, discription = ?, identification = ?, country = ?, type = ?, status = ?, speciality = ?, start_date = ?, end_date = ? WHERE id_mission = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									$data['title'],
									$data['discription'],
									$data['identification'],
									$data['country'],
									$data['type'],
									$data['status'],
									$data['speciality'],
									$data['start_date'],
									$data['end_date'],
									$data['id']
									)
							);			
		} catch (Exception $e) {
			die('Error Administrator(update_missions) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_update_mission($data){
		$this->update_mission($data);
	}

	private function delete_mission($id){
		try {
			$SQL = 'DELETE FROM missions WHERE id_mission = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array($id));			
		} catch (Exception $e) {
			die('Error Administrator(delete_mission) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_delete_mission($id){
		$this->delete_mission($id);
	}	
}


?>