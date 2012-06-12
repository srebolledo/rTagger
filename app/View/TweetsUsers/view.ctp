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
		<div class="six columns" style="float:left;display:block;">
			<?= $this->Html->link('Volver al inicio',array('controller'=>'pages','action'=>'display'));?>
		</div>
		<div class="six columns" style="float:right;display:block;">

		<?php
			if(count($tweet['pos']) == 0){
				if($tweet_id>1) echo $this->Html->link('Ver anterior',array('action'=>'view',$tweet_id-1));					
			}
			else{
				if($tweet_id>1) echo $this->Html->link('Ver anterior',array('action'=>'view',$tweet_id-1));					

				echo $this->Html->link('Ver siguiente',array('action'=>'view',$tweet_id+1));
			}

		?>
	</div>

	</div>
</div>