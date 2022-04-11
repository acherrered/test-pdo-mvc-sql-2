<?php
/*
	CRUD creado por Oscar Amado
	Contacto: oscarfamado@gmail.com
*/
class agentsController extends Agents{

	function index(){
	require_once('views/all/header.php');
	require_once('views/all/nav.php');
	//require_once('views/index/index.php');
	require_once('views/index/agentmodals.php');
	require_once('views/all/footer.php');
	}

	function table_agents(){
		?>
		<table class="table table-bordered">
			<thead>
				<tr>
				<th>#</th>
				<th>Name</th>
				<th>Family name</th>
        <th>Birthdate</th>
        <th>identification</th>
				<th>Nationality</th>
				<th>Speciality</th>
				</tr>
			</thead>
			<tbody >		
		<?php
		foreach (parent::get_view_agents()	as $data) {
		?>
		<tr>
			<td><?php echo $data->id_agent; ?> </td>
			<td><?php echo $data->name; ?> </td>
			<td><?php echo $data->family_name; ?> </td>
			<td><?php echo $data->birthdate; ?> </td>
			<td><?php echo $data->identification; ?> </td>
      <td><?php echo $data->nationality; ?> </td>
      <td><?php echo $data->speciality; ?> </td>
			<td>
			  <div class="btn-group">
			    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			    Seleccionar <span class="caret"></span></button>
			    <ul class="dropdown-menu" role="menu">
			      <li><a href="#" onclick="ModalUpdateAgent('<?php echo $data->id_agent; ?>','<?php echo $data->name; ?>','<?php echo $data->family_name; ?>','<?php echo $data->birthdate; ?>','<?php echo $data->identification; ?>','<?php echo $data->nationality; ?>','<?php echo $data->speciality; ?>');">Actualizar</a></li>
			      <li><a href="#" onclick="deleteAgent('<?php echo $data->id_agent; ?>');">Borrar</a></li>
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
    
	function deleteagent(){		
			parent::set_delete_agent($_REQUEST['id']);		
    }

	function registeragent(){
		$data = array(
					'name' 		=> $_REQUEST['name'],
					'family_name' => $_REQUEST['family_name'],
					'birthdate'		=> $_REQUEST['birthdate'],
      		'identification'		=> $_REQUEST['identification'],
      		'nationality'		=> $_REQUEST['nationality'],
          'speciality'		=> $_REQUEST['speciality']
					);		
					parent::set_register_agent($data);		
    }    
    
	function updateagent(){
		$data = array(
					'id'		=> $_REQUEST['id'],
					'name' 		=> $_REQUEST['name'],
					'family_name' => $_REQUEST['family_name'],
					'birthdate'		=> $_REQUEST['birthdate'],
      		'identification'		=> $_REQUEST['identification'],
      		'nationality'		=> $_REQUEST['nationality'],
          'speciality'		=> $_REQUEST['speciality']
					);
			parent::set_update_agent($data);		
	}    
    
}

