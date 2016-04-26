<?php
	# -> Controller: centro_servicio
	#Author: Londoño Ochoa

	//hacemos conexion a la base de datos(fusion_look)
	require_once("../Model/dbconn.php");
	//traemos las clases necesarias
	require_once("../Model/centro_servicio.class.php");
	//instanciamos las variables globales y una llamada "$accion"
	//"la variable accion nos indicara que parte del CRUD estamos creando"

	$accion=$_REQUEST["acc"];
	switch ($accion) {
		case 'C':
			# Create
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$id_centro			=$_POST["id_centro"];
			$nombre_centro		=$_POST["nombre_centro"];
			$direccion_centro	=$_POST["direccion_centro"];
			$email_centro		=$_POST["email_centro"];
			$telefono_centro	=$_POST["telefono_centro"];
			$ciudad				=$_POST["ciudad"];
			try {
				centro_servicio::Create($id_centro,$nombre_centro,$direccion_centro,$email_centro,$telefono_centro,$ciudad);
				$mensaje="Centro de servicio registrado con exito.";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de hacer el registro, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'U':
			# Update
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$nombre_centro		=$_POST["nombre_centro"];
			$direccion_centro	=$_POST["direccion_centro"];
			$email_centro		=$_POST["email_centro"];
			$telefono_centro	=$_POST["telefono_centro"];
			$ciudad				=$_POST["ciudad"];
			try {
				centro_servicio::Update($nombre_centro,$direccion_centro,$email_centro,$telefono_centro,$ciudad));
				$mensaje="Centro de servicio actualizado con exito.";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de actualizar el centro de servicio, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'D':
			# Delete
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$id_centro				=$_POST["id_centro"];

			try {
				centro_servicio::Delete($id_centro,$nombre_centro,$direccion_centro,$email_centro,$telefono_centro,$ciudad);
				$mensaje="Centro de servicio eliminado con exito.(Esta accion es irreversible)";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de eliminar el centro de servicio, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
	}
?>