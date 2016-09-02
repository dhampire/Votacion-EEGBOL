<?php 
	require 'config.php';
	$posts=$db->query("select * from posts order by likes desc");
	$cobras=$db->query("select * from cobras order by likes desc");

	@mysql_query ("SET NAMES 'utf8'");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resultados: ESTO ES GUERRA - Bolivia</title>


<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/estilos.css">


        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
	 	<div class="container">

		<div class="col-md-12 wow slideRight">
			<center><img src="img/logo.png" alt=""></center>
			
		</div>
	</div>

	<div class="container">
		<div class="col-md-6 col-md-offset-3 titulo">
			<h2>Resultados de las votaciones</h2>
		</div>	
	</div>
	<div class="container ingreso">
		<div class="col-md-6 leones">
		<h1 class="text-primary">Leones</h1>
			<?php 
				if ($filas=$posts->fetch_array())
				{
					do
					{
					?>

					<table class="table table-bordered">
						    <tbody>
						      <tr>
						        <td width="80%"><?php echo $filas["titulo"]; ?></td>
						        <td><?php echo $filas["likes"]?></td>
						      </tr>
						    </tbody>
						  </table>
					<?php
					}
					while($filas=$posts->fetch_array());
				}
				else echo "<h3>No hay entradas disponibles.</h3>";
				?>
		</div>
		<div class="col-md-6 cobras">
		<h1 class="text-primary">Cobras</h1>
			<?php 
				if ($filas=$cobras->fetch_array())
				{
					do
					{
					?>
						<table class="table table-bordered">
						    <tbody>
						      <tr>
						        <td width="80%"><?php echo $filas["titulo"]; ?></td>
						        <td><?php echo $filas["likes"]?></td>
						      </tr>
						    </tbody>
						  </table>
					<?php
					}
					while($filas=$cobras->fetch_array());
				}
				else echo "<h3>No hay entradas disponibles.</h3>";
				?>
		</div>		
	</div>
</body>