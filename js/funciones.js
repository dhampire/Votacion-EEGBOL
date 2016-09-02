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