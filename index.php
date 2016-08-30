<?php
	require_once("config.php");
	$posts=$db->query("select * from posts order by id desc");
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema de votaci&oacute;n Me gusta o No me gusta con PHP, Jquery y Ajax</title>

<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/estilos.css">
</style>
<style type="text/css">
.contenedor{width:600px;margin-right:auto;margin-left:auto;font-family:Georgia;font-size:13px;line-height:135%}
h3{color: #979797;border-bottom: 1px dotted #DDD;font-size:21px;padding:0 0 10px 0;clear:both}

/*voting style */


</style>
</head>

<body>

	<div class="container">
		<div class="col-md-12">
			<center>logo</center>
		</div>
	</div>

	<div class="container">
		<div class="col-md-6">Leones</div>
		<div class="col-md-6">cobras</div>
	</div>

	<div class="container">
		<div class="col-md-6 col-xs-6 imagenes">
			
			<?php 
				if ($filas=$posts->fetch_array())
				{
					do
					{
					?>
					<div class="col-md-6 cobras">
					<img src="img/<?php echo $filas["id"]?>.png" alt="">
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

		<div class="col-md-6 col-xs-6 imagenes">
			<div class="col-md-6 leones"></div>
			<div class="col-md-6 leones"></div>		</div>
	</div>



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
					li.closest("ul").append("<span class='votado'><div class='alert alert-success' role='alert'><strong>YGracias!</strong>Y</span>");
				}
				else li.closest("ul").append("<span class='votado'><div class='alert alert-warning' role='alert'<strong>Ya has votado!</strong></div></span>");
			});
			setTimeout(function() {$('.votado').fadeOut('fast');}, 3000);
		}
	});
});
</script>
</body>
</html>
