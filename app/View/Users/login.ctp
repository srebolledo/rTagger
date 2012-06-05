<div class="container">
<div class="seven columns" style="float:left">
	<div id="title"><h1>rTagger</h1> Etiquetador de textos cortos</div>
</div>
<div class="nine columns">
	<div id="loginbox">
	<?php
	echo $this->Form->create('User', array('action' => 'login'));
		echo $this->Form->input('username',array('label'=>'Nombre de usuario'));
		echo $this->Form->input('password',array('label'=>'Clave'));
		echo $this->Form->end('Ingresar');
		echo $this->Html->link('Registrar',array('controller'=>'users','action'=>'register'));
	?>
	</div>
</div>

</div>