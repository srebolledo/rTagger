<div class="container">
	<div class="six columns">
	<?php
		echo $this->Form->create('User', array('action' => 'login'));
		echo $this->Form->input('username',array('label'=>'Nombre de usuario'));
		echo $this->Form->input('password',array('label'=>'Clave'));
		echo $this->Form->end('Ingresar');
	?>
	</div>
</div>