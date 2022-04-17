function objectAjax(){
	var xmlhttp = false;
	try{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e){
		try{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");			
		} catch (E){
			xmlhttp = false;	
		}		
	}
	if(!xmlhttp && typeof XMLHttpRequest!='undefined'){
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}
//Inicializo automaticamente la funcion read al entrar a la pagina o recargar la pagina;
//addEventListener('load', read, false);

function read(){
        $.ajax({        
        		type: 'POST',
                url:   '?c=administrator&m=table_users',               
                beforeSend: function () {
                        $("#information").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#information").html(response);
                }
        });
}

/***** Agents ****/

//addEventListener('load', readagents, false);

function readagents(){
        $.ajax({        
        		type: 'POST',
                url:   '?c=agents&m=table_agents',               
                beforeSend: function () {
                        $("#information").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#information").html(response);
                }
        });
}

/***** Agents ****/


/***** Contacts ****/

function readcontacts(){
        $.ajax({        
        		type: 'POST',
                url:   '?c=contacts&m=table_contacts',               
                beforeSend: function () {
                        $("#information").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#information").html(response);
                }
        });
}

/***** Hideouts ****/

function readhideouts(){
        $.ajax({        
        		type: 'POST',
                url:   '?c=hideouts&m=table_hideouts',               
                beforeSend: function () {
                        $("#information").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#information").html(response);
                }
        });
}

/***** Hideouts ****/


/***** admins ****/

function readadmins(){
        $.ajax({        
        		type: 'POST',
                url:   '?c=admins&m=table_admins',               
                beforeSend: function () {
                        $("#information").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#information").html(response);
                }
        });
}

/***** adminss ****/

/***** targets ****/

function readtargets(){
        $.ajax({        
        		type: 'POST',
                url:   '?c=targets&m=table_targets',               
                beforeSend: function () {
                        $("#information").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#information").html(response);
                }
        });
}

/***** targets ****/


function register(){
	name 		= document.formUser.name.value;
	last_name 	= document.formUser.last_name.value;
	email 		= document.formUser.email.value;
	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=registeruser", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){			
			read();			
			alert('Data saved successfully.');			
			$('#addUser').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("name="+name+"&last_name="+last_name+"&email="+email);
}

function registeragent(){
	name 		= document.formAgent.name.value;
	family_name 	= document.formAgent.family_name.value;
	birthdate 		= document.formAgent.birthdate.value;
  identification = document.formAgent.identification.value;
	nationality 		= document.formAgent.nationality.value;
  speciality = document.formAgent.speciality.value;
	ajax = objectAjax();
	ajax.open("POST", "?c=agents&m=registeragent", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){			
			read();			
			alert('Data saved successfully.');			
			$('#addAgent').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("name="+name+"&family_name="+family_name+"&birthdate="+birthdate+"&identification="+identification+"&nationality="+nationality+"&speciality="+speciality+"&id="+id);
}	

function registercontact(){
	name 		= document.formContact.name.value;
	family_name 	= document.formContact.family_name.value;
	birthdate 		= document.formContact.birthdate.value;
  identification = document.formContact.identification.value;
	nationality 		= document.formContact.nationality.value;
	ajax = objectAjax();
	ajax.open("POST", "?c=contacts&m=registercontact", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){			
			read();			
			alert('Data saved successfully.');			
			$('#addContact').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("name="+name+"&family_name="+family_name+"&birthdate="+birthdate+"&identification="+identification+"&nationality="+nationality+"&id="+id);
}	


function registerhideout(){
	address 		= document.formHideout.address.value;
  country = document.formHideout.country.value;
  identification 	= document.formHideout.identification.value;
  type 	= document.formHideout.type.value;
	ajax = objectAjax();
	ajax.open("POST", "?c=hideouts&m=registerhideout", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){			
			read();			
			alert('Data saved successfully.');			
			$('#addHideout').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("address="+address+"&country="+country+"&identification="+identification+"&type="+type+"&id="+id);
}	

function registeradmin(){
	name 		= document.formAdmin.name.value;
  family = document.formAdmin.family.value;
	date 		= document.formAdmin.date.value;
  email = document.formAdmin.email.value;
  password 	= document.formAdmin.password.value;
	ajax = objectAjax();
	ajax.open("POST", "?c=admins&m=registeradmin", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){			
			read();			
			alert('Data saved successfully.');			
			$('#addAdmin').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("name="+name+"&family="+family+"&date="+date+"&email="+email+"&password="+password+"&id="+id);
}	

function registertarget(){
	name 		= document.formTarget.name.value;
  family = document.formTarget.family.value;
	identification 		= document.formTarget.identification.value;
  nationality = document.formTarget.nationality.value;
	ajax = objectAjax();
	ajax.open("POST", "?c=targets&m=registertarget", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){			
			read();			
			alert('Data saved successfully.');			
			$('#addTarget').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("name="+name+"&family="+family+"&identification="+identification+"&nationality="+nationality+"&id="+id);
}	


function update(){
	id 			= document.formUserUpdate.id.value;
	name 		= document.formUserUpdate.name.value;
	last_name 	= document.formUserUpdate.last_name.value;
	email 		= document.formUserUpdate.email.value;
	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=updateuser", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){
			read();
			$('#updateUser').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("name="+name+"&last_name="+last_name+"&email="+email+"&id="+id);

}

function updateagent(){
	id 			= document.formAgentUpdate.id.value;
	name 		= document.formAgentUpdate.name.value;
	family_name 	= document.formAgentUpdate.family_name.value;
	birthdate 		= document.formAgentUpdate.birthdate.value;
  identification = document.formAgentUpdate.identification.value;
	nationality 		= document.formAgentUpdate.nationality.value;
  speciality = document.formAgentUpdate.speciality.value;
	ajax = objectAjax();
	ajax.open("POST", "?c=agents&m=updateagent", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){
			read();
			$('#updateAgent').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("name="+name+"&family_name="+family_name+"&birthdate="+birthdate+"&identification="+identification+"&nationality="+nationality+"&speciality="+speciality+"&id="+id);

}

function updatecontact(){
	id 			= document.formContactUpdate.id.value;
	name 		= document.formContactUpdate.name.value;
	family_name 	= document.formContactUpdate.family_name.value;
	birthdate 		= document.formContactUpdate.birthdate.value;
  identification = document.formContactUpdate.identification.value;
	nationality 		= document.formContactUpdate.nationality.value;
	ajax = objectAjax();
	ajax.open("POST", "?c=contacts&m=updatecontact", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){
			read();
			$('#updateContact').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("name="+name+"&family_name="+family_name+"&birthdate="+birthdate+"&identification="+identification+"&nationality="+nationality+"&id="+id);

}

function updatehideout(){
	id 			= document.formHideoutUpdate.id.value;
	address 		= document.formHideoutUpdate.address.value;
	country 	= document.formHideoutUpdate.country.value;
  identification = document.formHideoutUpdate.identification.value;
  type = document.formHideoutUpdate.type.value;

	ajax = objectAjax();
	ajax.open("POST", "?c=hideouts&m=updatehideout", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){
			readhideouts();
			$('#updateHideout').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("address="+address+"&country="+country+"&identification="+identification+"&type="+type+"&id="+id);
console.log(updatehideout)
}

function updateadmin(){
	id 			= document.formAdminUpdate.id.value;
	name 		= document.formAdminUpdate.name.value;
  family = document.formAdminUpdate.family.value;
	date 		= document.formAdminUpdate.date.value;
  email = document.formAdminUpdate.email.value;
  password 	= document.formAdminUpdate.password.value;

	ajax = objectAjax();
	ajax.open("POST", "?c=admins&m=updateadmin", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){
			readadmins();
			$('#updateAdmin').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("name="+name+"&family="+family+"&date="+date+"&email="+email+"&password="+password+"&id="+id);
}

function updatetarget(){
	id 			= document.formTargetUpdate.id.value;
	name 		= document.formTargetUpdate.name.value;
  family = document.formTargetUpdate.family.value;
	identification 		= document.formTargetUpdate.identification.value;
  nationality = document.formTargetUpdate.nationality.value;

	ajax = objectAjax();
	ajax.open("POST", "?c=targets&m=updatetarget", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){
			readtargets();
			$('#updateTarget').modal('hide');
		}
	}
ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("name="+name+"&family="+family+"&identification="+identification+"&nationality="+nationality+"&id="+id);
}



function deleteUser(id){	
	if(confirm('¿Esta seguro de eliminar este registro?')){						
	ajax = objectAjax();
	ajax.open("POST", "?c=administrator&m=deleteuser", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){			
			read();		
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+id);
	}
}

function deleteAgent(id){	
	if(confirm('Are you sure you want to delete this agent?')){						
	ajax = objectAjax();
	ajax.open("POST", "?c=agents&m=deleteagent", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){			
			read();		
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+id);
	}
}

function deleteContact(id){	
	if(confirm('Are you sure you want to delete this agent?')){						
	ajax = objectAjax();
	ajax.open("POST", "?c=contacts&m=deletecontact", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){			
			read();		
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+id);
	}
}

function deleteHideout(id){	
	if(confirm('Are you sure you want to delete this agent?')){						
	ajax = objectAjax();
	ajax.open("POST", "?c=hideouts&m=deletehideout", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){			
			read();		
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+id);
	}
}

function deleteAdmin(id){	
	if(confirm('Are you sure you want to delete this agent?')){						
	ajax = objectAjax();
	ajax.open("POST", "?c=admins&m=deleteadmin", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){			
			read();		
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+id);
	}
}

function deleteTarget(id){	
	if(confirm('Are you sure you want to delete this agent?')){						
	ajax = objectAjax();
	ajax.open("POST", "?c=targets&m=deletetarget", true);
	ajax.onreadystatechange=function() {
		if(ajax.readyState==4){			
			readtargets();		
		}
	}
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("id="+id);
	}
}



function ModalRegister(){
	$('#addUser').modal('show');
}

function ModalRegisterAgent(){
	$('#addAgent').modal('show');
}

function ModalRegisterContact(){
	$('#addContact').modal('show');
}

function ModalRegisterHideout(){
	$('#addHideout').modal('show');
}

function ModalRegisterAdmin(){
	$('#addAdmin').modal('show');
}

function ModalRegisterTarget(){
	$('#addTarget').modal('show');
}


function ModalUpdate(id,name,last_name,email){			
	document.formUserUpdate.id.value 			= id;
	document.formUserUpdate.name.value 			= name;
	document.formUserUpdate.last_name.value 	= last_name;
	document.formUserUpdate.email.value 		= email;
	$('#updateUser').modal('show');
}

function ModalUpdateAgent(id,name,family_name,birthdate,identification,nationality,speciality){			
document.formAgentUpdate.id.value 			= id;
	document.formAgentUpdate.name.value 			= name;
	document.formAgentUpdate.family_name.value 	= family_name;
	document.formAgentUpdate.birthdate.value 		= birthdate;
	document.formAgentUpdate.identification.value 		= identification;
	document.formAgentUpdate.nationality.value 			= nationality;
	document.formAgentUpdate.speciality.value 			= speciality;
	$('#updateAgent').modal('show');
}

function ModalUpdateContact(id,name,family_name,birthdate,identification,nationality){			
document.formContactUpdate.id.value 			= id;
	document.formContactUpdate.name.value 			= name;
	document.formContactUpdate.family_name.value 	= family_name;
	document.formContactUpdate.birthdate.value 		= birthdate;
	document.formContactUpdate.identification.value 		= identification;
	document.formContactUpdate.nationality.value 			= nationality;
	$('#updateContact').modal('show');
}


function ModalUpdateHideout(id,address,country,identification,type){			
document.formHideoutUpdate.id.value 			= id;
	document.formHideoutUpdate.address.value 			= address;
	document.formHideoutUpdate.country.value 	= country;
	document.formHideoutUpdate.identification.value 		= identification;
	document.formHideoutUpdate.type.value 		= type;
	$('#updateHideout').modal('show');
}

function ModalUpdateAdmin(id,name,family,date,email,password){			
document.formAdminUpdate.id.value 			= id;
	document.formAdminUpdate.name.value 			= name;
	document.formAdminUpdate.family.value 	= family;
	document.formAdminUpdate.date.value 		= date;
	document.formAdminUpdate.email.value 		= email;
  document.formAdminUpdate.password.value 		= password;
	$('#updateAdmin').modal('show');
}

function ModalUpdateTarget(id,name,family,identification,nationality){			
document.formTargetUpdate.id.value 			= id;
	document.formTargetUpdate.name.value 			= name;
	document.formTargetUpdate.family.value 	= family;
	document.formTargetUpdate.identification.value 		= identification;
	document.formTargetUpdate.nationality.value 		= nationality;
	$('#updateTarget').modal('show');
}

/*
	CRUD creado por Oscar Amado
	Contacto: oscarfamado@gmail.com
*/