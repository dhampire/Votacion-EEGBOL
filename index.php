<?php

session_start(); 

	require_once("config.php");
	$posts=$db->query("select * from posts where id order by rand()");
	$cobras=$db->query("select * from cobras where id order by rand() ");

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Votación: ESTO ES GUERRA - Bolivia</title>
	<meta property="og:url"                content="http://360onlinemedia.com/votos" />
    <meta property="og:type"               content="article" />
	<meta property="og:title"              content="ESTO ES GUERRA" />
	<meta property="og:description"        content="Registrate y vota para inhablitar a un guerrero o guerrera" />
	<meta property="og:image"              content="http://360onlinemedia.com/votos/img/logo.jpg" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/estilos.css">


        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>

 	<div class="container">

		<div class="col-md-12 wow slideRight">
			<center><img src="img/logo.png" alt="">
			<h1 class="alert-danger inhabilita">Vota para <strong>INHABILITAR</strong> a un guerrero o guerrera</h1></center>
		</div>
	</div>
 <?php if ($_SESSION['FBID']): ?>      <!--  After user login  -->
	<div class="container">

			<div class="col-md-6 col-xs-6 logos"><center><img src="img/leones.png" alt=""></center></div>

			<div class="col-md-6 col-xs-6 logos"><center><img src="img/cobras.png" alt=""></center></div>

	</div>

	<div class="container">
		<div class="col-md-6 col-xs-6 leones">
			
			<?php 
				if ($filas=$posts->fetch_array())
				{
					do
					{
					?>
					<div class="col-md-6 cobras">
					<div class="col-md-6 alert-info votos-conteo"><strong>Votos:</strong> <?php echo $filas["likes"] ?></div>
					<img src="img/leones/<?php echo $filas["id"]?>.jpg" alt="">
					<div class="alert alert-info">
						<?php echo $filas["titulo"]; ?>
					</div>
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
					<div class="col-md-6 alert-info votos-conteo"><strong>Votos:</strong> <?php echo $filas["likes"] ?></div>
					<img src="img/cobras/<?php echo $filas["id"]?>.jpg" alt="">
					<div class="alert alert-info">
						<?php echo $filas["titulo"]; ?>
					</div>
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


<?php else: ?>
<div class="container">
	<div class="col-md-6 col-md-offset-3 ingreso">
			<h3>Para votar para inhabiltar a un guerrero o guerra, solo necesitas acceder con tu cuenta de facebook <br /> Haz click en el siguiente boton</h3>
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
					li.closest("ul").append("<span class='votado'><div class='alert alert-success popup' role='alert'><strong>!Gracias por tu voto¡</strong></span>");
				}

			});
			setTimeout(function() {$('.votado').fadeOut('fast');}, 1000);


		}
	});
});

</script>




<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-70777464-4', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>