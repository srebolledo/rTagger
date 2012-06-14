<div class="nerSubtags form">
<?php echo $this->Form->create('NerSubtag');?>
	<fieldset>
		<legend><?php echo __('Edit Ner Subtag'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('ner_tag_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('NerSubtag.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('NerSubtag.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ner Subtags'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Ner Tags'), array('controller' => 'ner_tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ner Tag'), array('controller' => 'ner_tags', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tweets Users'), array('controller' => 'tweets_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tweets User'), array('controller' => 'tweets_users', 'action' => 'add')); ?> </li>
	</ul>
</div>
