<div class="tweets form">
<?php echo $this->Form->create('Tweet');?>
	<fieldset>
		<legend><?php echo __('Add Tweet'); ?></legend>
	<?php
		echo $this->Form->input('user');
		echo $this->Form->input('status');
		echo $this->Form->input('date');
		echo $this->Form->input('checksum');
		echo $this->Form->input('tweet_reference');
		echo $this->Form->input('field6');
		echo $this->Form->input('field7');
		echo $this->Form->input('field8');
		echo $this->Form->input('field9');
		echo $this->Form->input('tweet');
		echo $this->Form->input('language');
		echo $this->Form->input('location');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tweets'), array('action' => 'index'));?></li>
	</ul>
</div>
