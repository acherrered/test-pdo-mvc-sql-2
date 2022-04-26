<?php
/*
DB update depending on the request
*/


class Missions extends db{
	

	private function view_missions(){
		try {
      
      $SQL = "SELECT M.*, GROUP_CONCAT(A.name) AS agent_name, GROUP_CONCAT(A.family_name) AS agent_family_name, GROUP_CONCAT(T.name) AS target_name, GROUP_CONCAT(H.address) AS hideout_address, GROUP_CONCAT(C.name) AS contact_name, GROUP_CONCAT(MS.id_agent) AS ids_agent, GROUP_CONCAT(MS.id_target) AS ids_target, GROUP_CONCAT(MS.id_hideout) AS ids_hideout, GROUP_CONCAT(MS.id_contact) AS ids_contact

FROM missions AS M
LEFT JOIN missionsspec AS MS ON MS.id_mission=M.id_mission
LEFT JOIN agents AS A ON MS.id_agent=A.id_agent
LEFT JOIN targets AS T ON MS.id_target=T.id_target
LEFT JOIN hideouts AS H ON MS.id_hideout=H.id_hideout
LEFT JOIN contacts AS C ON MS.id_contact=C.id_contact
GROUP BY M.id_mission

      ";
      
			$result = $this->connect()->prepare($SQL);
			$result->execute();
			return $result->fetchAll(PDO::FETCH_OBJ);	
      //var_dump($result);
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
      
       //var_dump($data); 

        $rslt = array();
      
        // Recherche des nationalités communes entre agents et targets
        if(!empty($data["agents"]) && !empty($data["targets"])) {
          
          $agents_str = $data['agents'];
          $targets_str = $data['targets'];

          $db = db::connect();
          $records = $db->prepare('SELECT A.*, T.name AS t_name
          FROM agents AS A
          INNER JOIN targets AS T ON A.nationality=T.nationality
          WHERE A.id_agent IN (?) AND T.id_target IN (?)
          GROUP BY id_agent');
          $records->execute(array($agents_str, $targets_str));
          $rslt = $records->fetchAll();
          //var_dump($rslt);
        } 
      
        if(!empty($rslt)) {
          
          // nationalités communes detecté
          foreach($rslt as $k=>$v) {
            echo "Nationalité commnues entre l'agent : ".$v['name']." et la cible : ".$v['t_name']."\n";
          }
          
        } else {
          // pas de nationalités communes

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
             //var_dump('Agents: '.$data['agents']);
             //var_dump($last_id);
            $SQL = 'INSERT INTO missionsspec (id_mission, id_agent) VALUES (?, ?)';
      			$result = $this->connect()->prepare($SQL);
  
            $data['agents'] = explode(",", $data['agents']);
            foreach($data['agents'] as $agent_id) {
      			  $result->execute(array($last_id, $agent_id));
            }
          }
  
            // Ajouter les Contacts
          if(!empty($data["contacts"])) {
             //var_dump('Contacts: '.$data['contacts']);
             //var_dump($last_id);
            $SQL = 'INSERT INTO missionsspec (id_mission, id_contact) VALUES (?, ?)';
      			$result = $this->connect()->prepare($SQL);
  
            $data['contacts'] = explode(",", $data['contacts']);
            foreach($data['contacts'] as $contact_id) {
      			  $result->execute(array($last_id, $contact_id));
            }
          }
  
            // Ajouter les Targets
          if(!empty($data["targets"])) {
             //var_dump('Targets: '.$data['targets']);
             //var_dump($last_id);
            $SQL = 'INSERT INTO missionsspec (id_mission, id_target) VALUES (?, ?)';
      			$result = $this->connect()->prepare($SQL);
  
            $data['targets'] = explode(",", $data['targets']);
            foreach($data['targets'] as $target_id) {
      			  $result->execute(array($last_id, $target_id));
            }
          }
             
          // Ajouter les planques
          if(!empty($data["hideouts"])) {
             //var_dump('Hideouts: '.$data['hideouts']);
             //var_dump($last_id);
            $SQL = 'INSERT INTO missionsspec (id_mission, id_hideout) VALUES (?, ?)';
      			$result = $this->connect()->prepare($SQL);
  
            $data['hideouts'] = explode(",", $data['hideouts']);
            foreach($data['hideouts'] as $hideout_id) {
      			  $result->execute(array($last_id, $hideout_id));
            }
          }

          echo 1;
          
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


        //var_dump($data); 

        $last_id = $data['id'];
      
        // Delete all missionsspec data 
        $SQL = 'DELETE FROM missionsspec WHERE id_mission=?';
        $result = $this->connect()->prepare($SQL);
        $result->execute(array($last_id));
            
        // Ajouter les agents
        if(!empty($data["agents"])) {
           //var_dump('Agents: '.$data['agents']);
           //var_dump($last_id);
          $SQL = 'INSERT INTO missionsspec (id_mission, id_agent) VALUES (?, ?)';
    			$result = $this->connect()->prepare($SQL);

          $data['agents'] = explode(",", $data['agents']);
          foreach($data['agents'] as $agent_id) {
    			  $result->execute(array($last_id, $agent_id));
          }
        }

        // Ajouter les Contacts
        if(!empty($data["contacts"])) {
           //var_dump('Contacts: '.$data['contacts']);
           //var_dump($last_id);
          $SQL = 'INSERT INTO missionsspec (id_mission, id_contact) VALUES (?, ?)';
    			$result = $this->connect()->prepare($SQL);

          $data['contacts'] = explode(",", $data['contacts']);
          foreach($data['contacts'] as $contact_id) {
    			  $result->execute(array($last_id, $contact_id));
          }
        }

        // Ajouter les Targets
        if(!empty($data["targets"])) {
           //var_dump('Targets: '.$data['targets']);
           //var_dump($last_id);
          $SQL = 'INSERT INTO missionsspec (id_mission, id_target) VALUES (?, ?)';
    			$result = $this->connect()->prepare($SQL);

          $data['targets'] = explode(",", $data['targets']);
          foreach($data['targets'] as $target_id) {
    			  $result->execute(array($last_id, $target_id));
          }
        }
           
        // Ajouter les planques
        if(!empty($data["hideouts"])) {
           //var_dump('Hideouts: '.$data['hideouts']);
           //var_dump($last_id);
          $SQL = 'INSERT INTO missionsspec (id_mission, id_hideout) VALUES (?, ?)';
    			$result = $this->connect()->prepare($SQL);

          $data['hideouts'] = explode(",", $data['hideouts']);
          foreach($data['hideouts'] as $hideout_id) {
    			  $result->execute(array($last_id, $hideout_id));
          }
        }


      
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