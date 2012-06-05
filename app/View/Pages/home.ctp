<script type="text/javascript">
	$(document).ready(function(){
		$("#tag").click(function(){
			  window.location = '<?= $this->base;?>/tweets_users/add';
		});
	});
</script>
<div class="container">
<div class="sixteen columns">
	<h1 style="text-align:center">Bienvenido a rTagger</h1>
	<p>
		Bienvenidos a rTagger, herramienta usada para etiquetar tweets de <?= $this->Html->link("Twitter","http://www.twitter.com");?>
	</p>	
	<p>Para comenzar haga click en el botón	</p>
	<div id="button"><button id="tag">Etiquetar</button> </div>
</div>
</div>