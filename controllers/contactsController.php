<?php

class contactsController extends Contacts{

	function index(){
	require_once('views/all/header.php');
	require_once('views/all/nav.php');
	require_once('views/index/index.php');
	require_once('views/index/contactmodals.php');
	require_once('views/all/footer.php');
	}

	function table_contacts(){
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
				</tr>
			</thead>
			<tbody >		
		<?php
		foreach (parent::get_view_contacts()	as $data) {
		?>
		<tr>
			<td><?php echo $data->id_contact; ?> </td>
			<td><?php echo $data->name; ?> </td>
			<td><?php echo $data->family_name; ?> </td>
			<td><?php echo $data->birthdate; ?> </td>
			<td><?php echo $data->identification; ?> </td>
      <td><?php echo $data->nationality; ?> </td>
			<td>
			  <div class="btn-group">
			    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			    Select <span class="caret"></span></button>
			    <ul class="dropdown-menu" role="menu">
			      <li><a href="#" onclick="ModalUpdateContact('<?php echo $data->id_contact; ?>','<?php echo $data->name; ?>','<?php echo $data->family_name; ?>','<?php echo $data->birthdate; ?>','<?php echo $data->identification; ?>','<?php echo $data->nationality; ?>');">Edit</a></li>
			      <li><a href="#" onclick="deleteContact('<?php echo $data->id_contact; ?>');">Delete</a></li>
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
    
	function deletecontact(){		
			parent::set_delete_contact($_REQUEST['id']);		
    }

	function registercontact(){
		$data = array(
					'name' 		=> $_REQUEST['name'],
					'family_name' => $_REQUEST['family_name'],
					'birthdate'		=> $_REQUEST['birthdate'],
      		'identification'		=> $_REQUEST['identification'],
      		'nationality'		=> $_REQUEST['nationality'],
					);		
					parent::set_register_contact($data);		
    }    
    
	function updatecontact(){
		$data = array(
					'id'		=> $_REQUEST['id'],
					'name' 		=> $_REQUEST['name'],
					'family_name' => $_REQUEST['family_name'],
					'birthdate'		=> $_REQUEST['birthdate'],
      		'identification'		=> $_REQUEST['identification'],
      		'nationality'		=> $_REQUEST['nationality'],
					);
			parent::set_update_contact($data);		
	}    
    
}

