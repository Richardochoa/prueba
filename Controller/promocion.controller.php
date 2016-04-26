<?php
	# -> Controller: promocion
	#Author: Londoño Ochoa

	//hacemos conexion a la base de datos(fusion_look)
	require_once("../Model/dbconn.php");
	//traemos las clases necesarias
	require_once("../Model/promocion.class.php");
	//instanciamos las variables globales y una llamada "$accion"
	//"la variable accion nos indicara que parte del CRUD estamos creando"

	$accion=$_REQUEST["acc"];
	switch ($accion) {
		case 'C':
			# Create
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$id_promocion			=$_POST["id_promocion"];
			$id_centro				=$_POST[".id_centro"];
			$nombre_promocion		=$_POST["nombre_promocion"];
			$descripcion			=$_POST["descripcion"];
			$fecha_ini_promo		=$_POST["fecha_ini_promo"];
			$fecha_fin_promo		=$_POST["fecha_fin_promo"];
			try {
				promocion::Create($id_promocion,$id_centro,$nombre_promocion,$descripcion,$fecha_ini_promo,$fecha_fin_promo);
				$mensaje="promocion registrada con exito.";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de hacer el registro, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'U':
			# Update
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$id_centro				=$_POST[".id_centro"];
			$nombre_promocion		=$_POST["nombre_promocion"];
			$descripcion			=$_POST["descripcion"];
			$fecha_ini_promo		=$_POST["fecha_ini_promo"];
			$fecha_fin_promo		=$_POST["fecha_fin_promo"];
			try {
				promocion::Update($id_centro,$nombre_promocion,$descripcion,$fecha_ini_promo,$fecha_fin_promo);
				$mensaje="promocion actualizada con exito.";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de actualizar la promocion, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
		case 'D':
			# Delete
			# inicializar las variables que enviara el formulario y las que se guardaran en la tabla
			$id_promocion			=$_POST["id_promocion"];

			try {
				promocion::Delete($id_promocion,$id_centro,$nombre_promocion,$descripcion,$fecha_ini_promo,$fecha_fin_promo);
				$mensaje="Promocion eliminada con exito.(Esta accion es irreversible)";
			} catch (Exception $e){
				$mensaje="Lo sentimos, ha ocurrido un error al momento de eliminar la promocion, ruta error: ".$e->getMessage().", ".$e->getFile().", ".$e->getLine();	
			}
			break;
	}
?>