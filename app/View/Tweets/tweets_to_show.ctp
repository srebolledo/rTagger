<div class="container">
	<div class="sixteeen columns">
		<h1 style="text-align:center">¿Usar este tweet?</h1>
		<?php echo $this->Form->create('Tweet');?>
		<h6>Faltan por revisar <?= $notReviewed;?> de un total de <?= $total?></h6>
		<h6>Revisados: <?= $reviewed?></h6>
		<h6>Usados: <?= $used?></h6>
		<?php
			$i=0;
			foreach($tweets as $tweet):

		?>	
				<div class="tweet_block">
					<div class="tweet ten columns" >
						<?= $tweet['Tweet']['tweet'];?>
					</div>
					<div class="four columns">
					<?= $this->Form->hidden('Tweet.'.$i.'.id',array('default'=>$tweet['Tweet']['id']));?>
					<?php
						if(count(explode(' ',$tweet['Tweet']['tweet'])) > 3){
							echo $this->Form->input('Tweet.'.$i.'.used',array('label'=>'Usar este tweet?','type'=>'checkbox','style'=>'text-align:left;display:inline-block;','checked'));		
						}
						else{
							echo $this->Form->input('Tweet.'.$i.'.used',array('label'=>'Usar este tweet?','type'=>'checkbox','style'=>'text-align:left;display:inline-block;'));			
						}
					?>
					</div>
				</div>
		<?php
			$i++;
			endforeach;
		?>




	</div>
			<?php echo $this->Form->end('Enviar');?>	


</div>