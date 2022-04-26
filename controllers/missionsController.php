<?php
/*
	CRUD creado por Oscar Amado
	Contacto: oscarfamado@gmail.com
*/

class missionsController extends Missions{

	function index(){
	require_once('views/all/header.php');
	require_once('views/all/nav.php');
	require_once('views/index/index.php');
	require_once('views/index/contactmodals.php');
  require_once('views/index/hideoutsmodals.php');
  require_once('views/index/targetsmodals.php');
  require_once('views/index/missionsmodals.php');
	require_once('views/all/footer.php');
	}

	function table_missions(){
		?>
		<table class="table table-bordered">
			<thead>
				<tr>
				<th>#</th>
				<th>title</th>
				<th>discription</th>
        <th>identification</th>
        <th>country</th>
				<th>type</th>
				<th>status</th>
        <th>speciality</th>
        <th>Agents</th>
        <th>Targets</th>
        <th>Hideouts</th>
        <th>Contacts</th>
        <th>start_date</th>
        <th>end_date</th>
				</tr>
			</thead>
			<tbody >		
		<?php
		foreach (parent::get_view_missions()	as $data) {
		?>
		<tr>
			<td><?php echo $data->id_mission; ?> </td>
			<td><?php echo $data->title; ?> </td>
			<td><?php echo $data->discription; ?> </td>
			<td><?php echo $data->identification; ?> </td>
			<td><?php echo $data->country; ?> </td>
			<td><?php echo $data->type; ?> </td>
			<td><?php echo $data->status; ?> </td>
			<td><?php echo $data->speciality; ?> </td>
			<td><?php echo $data->agent_family_name; ?> </td>
			<td><?php echo $data->target_name; ?> </td>
			<td><?php echo $data->hideout_address; ?> </td>
			<td><?php echo $data->contact_name; ?> </td>
			<td><?php echo $data->start_date; ?> </td>
			<td><?php echo $data->end_date; ?> </td>
			<td>
			  <div class="btn-group">
			    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			    Select <span class="caret"></span></button>
			    <ul class="dropdown-menu" role="menu">
			      <li><a href="#" onclick="ModalUpdateMission('<?php echo $data->id_mission; ?>','<?php echo $data->title; ?>','<?php echo $data->discription; ?>','<?php echo $data->identification; ?>','<?php echo $data->country; ?>','<?php echo $data->type; ?>','<?php echo $data->status; ?>','<?php echo $data->speciality; ?>','<?php echo $data->start_date; ?>','<?php echo $data->end_date; ?>','<?php echo $data->ids_agent; ?>','<?php echo $data->ids_hideout; ?>','<?php echo $data->ids_contact; ?>','<?php echo $data->ids_target; ?>');">Edit</a></li>
			      <li><a href="#" onclick="deleteMission('<?php echo $data->id_mission; ?>');">Delete</a></li>
			    </ul>
			  </div>
			</td>
		</tr>
		<?php
		}
		?>
			</tbody>
		</table>
	<?php	
    }
    
	function deletemission(){		
			parent::set_delete_mission($_REQUEST['id']);		
    }

	function registermission(){
		$data = array(
					'title' 		=> $_REQUEST['title'],
					'discription' => $_REQUEST['discription'],
      		'identification'		=> $_REQUEST['identification'],
      		'country'		=> $_REQUEST['country'],
      		'type' 		=> $_REQUEST['type'],
					'status' => $_REQUEST['status'],
      		'speciality'		=> $_REQUEST['speciality'],
      		'agents'		=> $_REQUEST['agents'],
      		'hideouts'		=> $_REQUEST['hideouts'],
      		'targets'		=> $_REQUEST['targets'],
      		'contacts'		=> $_REQUEST['contacts'],
      		'start_date'		=> $_REQUEST['start_date'],
      		'end_date'		=> $_REQUEST['end_date']
					);		
					parent::set_register_mission($data);		
    }    
    
	function updatemission(){
		$data = array(
					'id'		=> $_REQUEST['id'],
					'title' 		=> $_REQUEST['title'],
					'discription' => $_REQUEST['discription'],
      		'identification'		=> $_REQUEST['identification'],
      		'country'		=> $_REQUEST['country'],
      		'type' 		=> $_REQUEST['type'],
					'status' => $_REQUEST['status'],
      		'speciality'		=> $_REQUEST['speciality'],
      		'agents'		=> $_REQUEST['agents'],
      		'hideouts'		=> $_REQUEST['hideouts'],
      		'targets'		=> $_REQUEST['targets'],
      		'contacts'		=> $_REQUEST['contacts'],
      		'start_date'		=> $_REQUEST['start_date'],
      		'end_date'		=> $_REQUEST['end_date']
					);
			parent::set_update_mission($data);
    //var_dump($data);
	}    
    
}

