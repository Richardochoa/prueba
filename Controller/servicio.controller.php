<?php
	# -> Controller: servicio
	#Author: Londoño Ochoa

	//hacemos conexion a la base de datos(fusion_look)
	require_once("../Model/dbconn.php");
	//traemos las clases necesarias
	require_once("../Model/servicio.class.php");
	//instanciamos las variables globales y una llamada "$accion"
	//"la variable accion nos indicara que parte del CRUD estamos creando"

	$accion=$_REQUEST["acc"];
	switch ($accion) {
		case 'C':
			# Create
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$id_servicio			=$_POST["id_servicio"];
			$id_centro				=$_POST[".id_centro"];
			$id_tipo				=$_POST["id_tipo"];
			$nombre_servicio		=$_POST["nombre_servicio"];
			try {
				servicio::Create($id_servicio,$id_centro,$id_tipo,$nombre_servicio);
				$mensaje="Servicio registrado con exito.";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de hacer el registro, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'U':
			# Update
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$id_centro				=$_POST[".id_centro"];
			$id_tipo				=$_POST["id_tipo"];
			$nombre_servicio		=$_POST["nombre_servicio"];
			try {
				servicio::Update($id_centro,$id_tipo,$nombre_servicio);
				$mensaje="Servicio actualizado con exito.";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de actualizar el servicio, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'D':
			# Delete
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$id_servicio				=$_POST["id_servicio"];

			try {
				servicio::Delete($id_servicio,$id_centro,$id_tipo,$nombre_servicio);
				$mensaje="Servicio eliminado con exito.(Esta accion es irreversible)";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de eliminar el servicio, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
	}
?>