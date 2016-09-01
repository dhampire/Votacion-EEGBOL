<?php

session_start(); 

	require_once("config.php");
	$posts=$db->query("select * from posts WHERE id order by rand()");
	$cobras=$db->query("select * from cobras WHERE id order by rand() ");

	$id = $_SESSION['FBID'];
	$nombre = $_SESSION['FULLNAME'];
	$correo = $_SESSION['EMAIL'];
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Votación: ESTO ES GUERRA - Bolivia</title>

<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/estilos.css">
</head>

<body>
 <?php if ($_SESSION['FBID']): ?>      <!--  After user login  -->
 	<div class="container">

		<div class="col-md-12">
			<center><img src="img/logo.png" alt=""></center>
			
		</div>
	</div>

	<div class="container">
		<div class="col-md-6">
			<div class="col-md-6"><center><img src="img/leones.png" alt=""></center></div>
		</div>
		<div class="col-md-6">
			<div class="col-md-6"><center><img src="img/cobras.png" alt=""></center></div>
		</div>
	</div>
<div class="fuegos row">
	<div class="container">
		<div class="col-md-6 col-xs-6 leones">
			
			<?php 
				if ($filas=$posts->fetch_array())
				{
					do
					{
					?>
					<div class="col-md-6 cobras">
					<img src="img/leones/<?php echo $filas["id"]?>.png" alt="">
					<ul class="votos">
						<li class="btn btn-success" data-voto="likes" data-id="<?php echo $filas["id"]; ?>">¡ VOTA !</li>
					</ul>
					</div>
					<?php
					}
					while($filas=$posts->fetch_array());
				}
				else echo "<h3>No hay entradas disponibles.</h3>";
				?>
			</div>

		<div class="col-md-6 col-xs-6">
			<?php 
				if ($filas=$cobras->fetch_array())
				{
					do
					{
					?>
					<div class="col-md-6 cobras">
					<img src="img/cobras/<?php echo $filas["id"]?>.png" alt="">
					<ul class="votos">
						<li class="btn btn-success" data-voto="likes" data-id="<?php echo $filas["id"]; ?>">¡ VOTA !</li>
					</ul>
					</div>
					<?php
					}
					while($filas=$cobras->fetch_array());
				}
				else echo "<h3>No hay entradas disponibles.</h3>";
				?>
		</div>
	</div>

</div>

<?php else: ?>
<div class="container">
	<div class="col md-6 col-md-offset-3 ingreso">
			<h3>Para votar por tu guerrrero favorito, solo necesitas hacer click en el siguiente boton</h3>
			<a href="fbconfig.php" class="button facebook"><span><i class="fa fa-facebook"></i></span><p>Facebook</p></a>
	</div>
</div>

<?php endif ?>

<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function() 
{
	$(".votos .btn").click(function (e) 
	{
	 	e.preventDefault();
		var voto_hecho = $(this).data('voto');
		var id = $(this).data("id"); 
		var li = $(this);
		
		if(voto_hecho && id)
		{
			$.post('ajax_voto.php', {'id':id, 'voto':voto_hecho}, function(data) 
			{
				if (data!="voto_duplicado") 
				{
					li.addClass(voto_hecho+"_votado").find("span").text(data);
					li.closest("ul").append("<span class='votado'><div class='alert alert-success' role='alert'><strong>!Gracias por tu voto¡</strong></span>");
				}

			});
			setTimeout(function() {$('.votado').fadeOut('fast');}, 1000);
		}
	});


});

</script>

<script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>
</body>
</html>