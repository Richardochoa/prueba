<?php
	# -> Controller: usuarios
	#Author: Londoño Ochoa

	//hacemos conexion a la base de datos(fusion_look)
	require_once("../Model/dbconn.php");
	//traemos las clases necesarias
	require_once("../Model/usuarios.class.php");
	//instanciamos las variables globales y una llamada "$accion"
	//"la variable accion nos indicara que parte del CRUD estamos creando"

	$accion=$_REQUEST["acc"];
	switch ($accion) {
		case 'C':
			# Create
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$id_usuario				=$_POST["id_usuario"];
			$id_rol					=$_POST["id_rol"];
			$nombre_usuario			=$_POST["nombre_usuario"];
			$apellido_usuario		=$_POST["apellido_usuario"];
			$clave					=$_POST["clave"];
			$email_usuario			=$_POST["email_usuario"];
			$telefono				=$_POST["telefono"];
			$sexo					=$_POST["sexo"];
			$estado					=$_POST["estado"];
			try {
				usuarios::Create($id_usuario,$id_rol,$nombre_usuario,$apellido_usuario,$clave,$email_usuario,$telefono,$sexo,$estado);
				$mensaje="Usuario registrado con exito.";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de hacer el registro, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'U':
			# Update
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$id_rol					=$_POST["id_rol"];
			$nombre_usuario			=$_POST["nombre_usuario"];
			$apellido_usuario		=$_POST["apellido_usuario"];
			$clave					=$_POST["clave"];
			$email_usuario			=$_POST["email_usuario"];
			$telefono				=$_POST["telefono"];
			$sexo					=$_POST["sexo"];
			$estado					=$_POST["estado"];
			try {
				usuarios::Update($id_rol,$nombre_usuario,$apellido_usuario,$clave,$email_usuario,$telefono,$sexo,$estado);
				$mensaje="Usuario actualizado con exito.";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de actualizar el usuario, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'D':
			# Delete
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$id_usuario				=$_POST["id_usuario"];

			try {
				usuarios::Delete($id_usuario,$id_rol,$nombre_usuario,$apellido_usuario,$clave,$email_usuario,$telefono,$sexo,$estado);
				$mensaje="Usuario eliminado con exito.(Esta accion es irreversible)";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de eliminar el usuario, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
	}
?>