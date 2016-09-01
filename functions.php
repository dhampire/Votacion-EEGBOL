<?php
require 'funciones.php';
conectar('localhost', 'esg_votos', '+hcG?gnx5sX~', 'votos');

function checkuser($fbid,$fbfullname,$femail){
  $check = mysql_query("select * from usuarios where id='$fbid'");
  $check = mysql_num_rows($check);
  
  if (empty($check)) { // if new user . Insert a new record   
  $query = "INSERT INTO usuarios (id,nombre,email) VALUES ('$fbid','$fbfullname','$femail')";
  mysql_query($query);  
  } else {   // If Returned user . update the user record   
  
  $query = "UPDATE usuarios SET nombre='$fbfullname', email='$femail' where id='$fbid'";
  mysql_query($query);
  }
}?>
