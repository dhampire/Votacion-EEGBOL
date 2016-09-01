<?php 
require_once("funciones.php");
conectar('localhost', 'root', '', 'like');
$id="1";
$nombre ="jorge";
$correo = "jo@hol.com";

$actualizar= @mysql_query('INSERT INTO usuarios (id, nombre, email) values ("'.$id.'", "'.$nombre.'", "'.$correo.'")');

if($actualizar)
	{
		echo 'bien!';
	}else{
		echo 'Hubo un error en el registro.' ;	
	}

?>