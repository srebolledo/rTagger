<div class="container">
	<div class="sixteen columns">
		
		<h2><?php  echo __('Viendo un tweet etiquetado');?></h2>
		<h4>Etiquetado gramatical</h4>
		<?php
			$i = 1;
			foreach($tweet['pos'] as $t){
				echo "<div id='tweet'>";
				echo $i.") ".$t;
				echo "</div>";
				$i++;
			}
		?>
		<h4>Etiquetado de entidades nombradas</h4>
		<?php
			$i = 1;
			foreach($tweet['ner'] as $t){
				echo "<div id='tweet'>";
				echo $i.") ".$t;
				echo "</div>";
				$i++;
				
			}
		?>
	</div>
</div>