<div class="nerTags form">
<?php echo $this->Form->create('NerTag');?>
	<fieldset>
		<legend><?php echo __('Add Ner Tag'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ner Tags'), array('action' => 'index'));?></li>
	</ul>
</div>
