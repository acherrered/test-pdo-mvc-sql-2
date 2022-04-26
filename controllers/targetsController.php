<?php


class targetsController extends targets{

	function index(){
	require_once('views/all/header.php');
	require_once('views/all/nav.php');
	require_once('views/index/index.php');
	require_once('views/index/contactmodals.php');
  require_once('views/index/hideoutsmodals.php');
  require_once('views/index/targetsmodals.php');
	require_once('views/all/footer.php');
	}

	function table_targets(){
		?>
		<table class="table table-bordered">
			<thead>
				<tr>
				<th>#</th>
				<th>name</th>
				<th>family</th>
        <th>identification</th>
        <th>nationality</th>
				</tr>
			</thead>
			<tbody >		
		<?php
		foreach (parent::get_view_targets()	as $data) {
		?>
		<tr>
			<td><?php echo $data->id_target; ?> </td>
			<td><?php echo $data->name; ?> </td>
			<td><?php echo $data->family; ?> </td>
			<td><?php echo $data->identification; ?> </td>
			<td><?php echo $data->nationality; ?> </td>
			<td>
			  <div class="btn-group">
			    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			    Select <span class="caret"></span></button>
			    <ul class="dropdown-menu" role="menu">
			      <li><a href="#" onclick="ModalUpdateTarget('<?php echo $data->id_target; ?>','<?php echo $data->name; ?>','<?php echo $data->family; ?>','<?php echo $data->identification; ?>','<?php echo $data->nationality; ?>');">Edit</a></li>
			      <li><a href="#" onclick="deleteTarget('<?php echo $data->id_target; ?>');">Delet</a></li>
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
    
	function deletetarget(){		
			parent::set_delete_target($_REQUEST['id']);		
    }

	function registertarget(){
		$data = array(
					'name' 		=> $_REQUEST['name'],
					'family' => $_REQUEST['family'],
      		'identification'		=> $_REQUEST['identification'],
      		'nationality'		=> $_REQUEST['nationality']
					);		
					parent::set_register_target($data);		
    }    
    
	function updatetarget(){
		$data = array(
					'id'		=> $_REQUEST['id'],
					'name' 		=> $_REQUEST['name'],
					'family' => $_REQUEST['family'],
      		'identification'		=> $_REQUEST['identification'],
      		'nationality'		=> $_REQUEST['nationality']
					);
			parent::set_update_target($data);
    var_dump($data);
	}    
    
}

