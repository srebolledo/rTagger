<div class="container">
	<div class="sixteen columns">
		<h1 style="text-align:center">¿Usar este tweet?</h1>
		<?php echo $this->Form->create('Tweet');?>
		<h6>Faltan por revisar <?= $notReviewed;?> de un total de <?= $total?></h6>
		<?= $this->Form->hidden('Tweet.id',array('default'=>$tweet['Tweet']['id']));?>
		<?= $this->Form->input('used',array('label'=>'Usar este tweet?','type'=>'checkbox','style'=>'text-align:left;display:inline-block;','checked'));?>
		<?php echo $this->Form->end('Enviar');?>	
		<div class="tweet" >
			<?= $tweet['Tweet']['tweet'];?>

		</div>


	

	</div>

</div>