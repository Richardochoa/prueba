<?php
	# -> Controller: usuarios_empleado
	#Author: Londoño Ochoa

	//hacemos conexion a la base de datos(fusion_look)
	require_once("../Model/dbconn.php");
	//traemos las clases necesarias
	require_once("../Model/usuarios_empleado.class.php");
	//instanciamos las variables globales y una llamada "$accion"
	//"la variable accion nos indicara que parte del CRUD estamos creando"

	$accion=$_REQUEST["acc"];
	switch ($accion) {
		case 'C':
			# Create
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$id_usuario				=$_POST["id_usuario"];
			$id_rol					=$_POST["id_rol"];
			$id_centro				=$_POST["id_centro"];
			$nombre_usuario			=$_POST["nombre_usuario"];
			$apellido_usuario		=$_POST["apellido_usuario"];
			$clave					=$_POST["clave"];
			$email_usuario			=$_POST["email_usuario"];
			$telefono				=$_POST["telefono"];
			$sexo					=$_POST["sexo"];
			$estado					=$_POST["estado"];
			$especialidad			=$_POST["especialidad"];
			try {
				usuarios::Create($id_usuario,$id_rol,$id_centro,$nombre_usuario,$apellido_usuario,$clave,$email_usuario,$telefono,$sexo,$estado,$especialidad);
				$mensaje="Empleado registrado con exito.";
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
			$especialidad			=$_POST["especialidad"];
			try {
				usuarios::Update($id_rol,$id_centro,$nombre_usuario,$apellido_usuario,$clave,$email_usuario,$telefono,$sexo,$estado,$especialidad);
				$mensaje="Empleado actualizado con exito.";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de actualizar el empleado, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'D':
			# Delete
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$id_usuario				=$_POST["id_usuario"];

			try {
				usuarios::Delete($id_usuario,$id_rol,$id_centro,$nombre_usuario,$apellido_usuario,$clave,$email_usuario,$telefono,$sexo,$estado,$especialidad);
				$mensaje="Empleado eliminado con exito.(Esta accion es irreversible)";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de eliminar el empleado, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
	}
?>