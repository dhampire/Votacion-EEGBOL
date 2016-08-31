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

}
?>