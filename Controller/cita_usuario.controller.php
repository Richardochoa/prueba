<?php
	# -> Controller: cita_usuario
	#Author: Londoño Ochoa

	//hacemos conexion a la base de datos(fusion_look)
	require_once("../Model/dbconn.php");
	//traemos las clases necesarias
	require_once("../Model/cita_usuario.class.php");
	//instanciamos las variables globales y una llamada "$accion"
	//"la variable accion nos indicara que parte del CRUD estamos creando"

	$accion=$_REQUEST["acc"];
	switch ($accion) {
		case 'C':
			# Create
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$id_cita			=$_POST["id_cita"];
			$id_centro          =$_POST["id_centro"]
			$id_usuario			=$_POST["id_usuario"];
			$fecha_cita			=$_POST["fecha_cita"];
			$estado_cita		=$_POST["estado_cita"];
			try {
				cita_usuario::Create($id_cita,$id_centro,$id_usuario,$fecha_cita,$estado_cita);
				$mensaje="Cita agendada con exito.";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de agendar la cita, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'U':
			# Update
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$fecha_cita			=$_POST["fecha_cita"];
			$estado_cita		=$_POST["estado_cita"];
			try {
				cita_usuario::Update($fecha_cita,$estado_cita);
				$mensaje="Cita actualizado con exito.";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de actualizar la cita, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'D':
			# Delete
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$id_cita				=$_POST["id_cita"];

			try {
				cita_usuario::Delete($id_cita,$id_centro,$id_usuario,$fecha_cita,$estado_cita);
				$mensaje="Cita eliminado con exito.(Esta accion es irreversible)";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de eliminar la cita, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
	}
?>