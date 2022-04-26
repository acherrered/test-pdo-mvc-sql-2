<?php

class hideoutsController extends Hideouts{

	function index(){
	require_once('views/all/header.php');
	require_once('views/all/nav.php');
	require_once('views/index/index.php');
	require_once('views/index/contactmodals.php');
  require_once('views/index/hideoutsmodals.php');
	require_once('views/all/footer.php');
	}

	function table_hideouts(){
		?>
		<table class="table table-bordered">
			<thead>
				<tr>
				<th>#</th>
				<th>Address</th>
				<th>country</th>
        <th>identification</th>
        <th>type</th>
				</tr>
			</thead>
			<tbody >		
		<?php
		foreach (parent::get_view_hideouts()	as $data) {
		?>
		<tr>
			<td><?php echo $data->id_hideout; ?> </td>
			<td><?php echo $data->address; ?> </td>
			<td><?php echo $data->country; ?> </td>
			<td><?php echo $data->identification; ?> </td>
			<td><?php echo $data->type; ?> </td>
			<td>
			  <div class="btn-group">
			    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			    Select <span class="caret"></span></button>
			    <ul class="dropdown-menu" role="menu">
			      <li><a href="#" onclick="ModalUpdateHideout('<?php echo $data->id_hideout; ?>','<?php echo $data->address; ?>','<?php echo $data->country; ?>','<?php echo $data->identification; ?>','<?php echo $data->type; ?>');">Edit</a></li>
			      <li><a href="#" onclick="deleteHideout('<?php echo $data->id_hideout; ?>');">Delete</a></li>
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
    
	function deletehideout(){		
			parent::set_delete_hideout($_REQUEST['id']);		
    }

	function registerhideout(){
		$data = array(
					'address' 		=> $_REQUEST['address'],
					'country' => $_REQUEST['country'],
      		'identification'		=> $_REQUEST['identification'],
      		'type'		=> $_REQUEST['type']
					);		
					parent::set_register_hideout($data);		
    }    
    
	function updatehideout(){
		$data = array(
					'id'		=> $_REQUEST['id'],
					'address' 		=> $_REQUEST['address'],
					'country' => $_REQUEST['country'],
      		'identification'		=> $_REQUEST['identification'],
      		'type'		=> $_REQUEST['type']
					);
			parent::set_update_hideout($data);
    var_dump($data);
	}    
    
}

