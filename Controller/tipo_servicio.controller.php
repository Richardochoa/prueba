<?php
	# -> Controller: tipo_servicio
	#Author: Londoño Ochoa

	//hacemos conexion a la base de datos(fusion_look)
	require_once("../Model/dbconn.php");
	//traemos las clases necesarias
	require_once("../Model/tipo_servicio.class.php");
	//instanciamos las variables globales y una llamada "$accion"
	//"la variable accion nos indicara que parte del CRUD estamos creando"

	$accion=$_REQUEST["acc"];
	switch ($accion) {
		case 'C':
			# Create
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$id_tipo				=$_POST["id_tipo"];
			$nombre_tipo_servicio	=$_POST["nombre_tipo_servicio"];
			try {
				tipo_servicio::Create($id_tipo,$nombre_tipo_servicio);
				$mensaje="Tipo de servicio registrado con exito.";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de hacer el registro, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'U':
			# Update
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$nombre_tipo_servicio			=$_POST["nombre_tipo_servicio"];
			try {
				tipo_servicio::Update($nombre_tipo_servicio);
				$mensaje="Tipo de servicio actualizado con exito.";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de actualizar el tipo de servicio, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'D':
			# Delete
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$id_tipo				=$_POST["id_tipo"];

			try {
				tipo_servicio::Delete($id_tipo,$nombre_tipo_servicio);
				$mensaje="Tipo de servicio eliminado con exito.(Esta accion es irreversible)";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de eliminar el tipo de servicio, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
	}
?>