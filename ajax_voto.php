<?php
require_once("config.php");
if($_POST)
{
	$voto = trim($_POST["voto"]);
	$id = filter_var(trim($_POST["id"]),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
	
		$total_votos=$db->query("select ".$voto." from posts WHERE id='$id' limit 1");
		if ($fila=$total_votos->fetch_array()) $numero=$fila[$voto];
		
		$votado=$db->query("UPDATE posts SET ".$voto."=".$voto."+1 WHERE id='$id'");
		echo ($numero+1);

		$total_votos=$db->query("select ".$voto." from cobras WHERE id='$id' limit 1");
		if ($fila=$total_votos->fetch_array()) $numero=$fila[$voto];

		$votado=$db->query("UPDATE cobras SET ".$voto."=".$voto."+1 WHERE id='$id'");
		echo ($numero+1);
}
endif

function checkuser($fbid,$fbfullname,$femail){
	$check = mysql_query("select * from Users where id='$fbid'");
	$check = mysql_num_rows($check);
	
	if (empty($check)) { // if new user . Insert a new record		
	$query = "INSERT INTO usuarios (id,nombre,email) VALUES ('$fbid','$fbfullname','$femail')";
	mysql_query($query);	
	} else {   // If Returned user . update the user record		
	
	$query = "UPDATE usuarios SET nombre='$fbfullname', email='$femail' where id='$fbid'";
	mysql_query($query);
	}
?>