<div class="container">
	<div class="seven columns" style="float:left">
		<div id="title"><h1>rTagger</h1> Etiquetador de textos cortos</div>
	</div>
	<div class="nine columns">
		<div id="loginbox">
			<?php echo $this->Form->create('User');?>
				<?php
					echo $this->Form->input('username',array('label'=>'Nombre de usuario'));
					echo $this->Form->input('password',array('label'=>'Clave'));
					echo $this->Form->input('password2',array('type'=>'password','label'=>'Confirmar la clave'));
				?>
			<?php echo $this->Form->end(__('Registrar'));?>
		</div>
	</div>

</div>

