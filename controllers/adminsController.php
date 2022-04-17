<?php
/*
	CRUD creado por Oscar Amado
	Contacto: oscarfamado@gmail.com
*/

class adminsController extends admins{

	function index(){
	require_once('views/all/header.php');
	require_once('views/all/nav.php');
	require_once('views/index/index.php');
	require_once('views/index/contactmodals.php');
  require_once('views/index/hideoutsmodals.php');
  require_once('views/index/adminsmodals.php');
	require_once('views/all/footer.php');
	}

	function table_admins(){
		?>
		<table class="table table-bordered">
			<thead>
				<tr>
				<th>#</th>
				<th>name</th>
				<th>family</th>
        <th>date</th>
        <th>email</th>
        <th>password</th>
				</tr>
			</thead>
			<tbody >		
		<?php
		foreach (parent::get_view_admins()	as $data) {
		?>
		<tr>
			<td><?php echo $data->id_admin; ?> </td>
			<td><?php echo $data->name; ?> </td>
			<td><?php echo $data->family; ?> </td>
			<td><?php echo $data->date; ?> </td>
			<td><?php echo $data->email; ?> </td>
			<td><?php echo $data->password; ?> </td>
			<td>
			  <div class="btn-group">
			    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			    Seleccionar <span class="caret"></span></button>
			    <ul class="dropdown-menu" role="menu">
			      <li><a href="#" onclick="ModalUpdateAdmin('<?php echo $data->id_admin; ?>','<?php echo $data->name; ?>','<?php echo $data->family; ?>','<?php echo $data->date; ?>','<?php echo $data->email; ?>','<?php echo $data->password; ?>');">Actualizar</a></li>
			      <li><a href="#" onclick="deleteAdmin('<?php echo $data->id_admin; ?>');">Borrar</a></li>
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
    
	function deleteadmin(){		
			parent::set_delete_admin($_REQUEST['id']);		
    }

	function registeradmin(){
		$data = array(
					'name' 		=> $_REQUEST['name'],
					'family' => $_REQUEST['family'],
      		'date'		=> $_REQUEST['date'],
      		'email'		=> $_REQUEST['email'],
      		'password'		=> $_REQUEST['password']
					);		
					parent::set_register_admin($data);		
    }    
    
	function updateadmin(){
		$data = array(
					'id'		=> $_REQUEST['id'],
					'name' 		=> $_REQUEST['name'],
					'family' => $_REQUEST['family'],
      		'date'		=> $_REQUEST['date'],
      		'email'		=> $_REQUEST['email'],
      		'password'		=> $_REQUEST['password']
					);
			parent::set_update_admin($data);
    var_dump($data);
	}    
    
}

