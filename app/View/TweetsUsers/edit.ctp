<div class="tweetsUsers form">
<?php echo $this->Form->create('TweetsUser');?>
	<fieldset>
		<legend><?php echo __('Edit Tweets User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tweet_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('position_tweet');
		echo $this->Form->input('linked');
		echo $this->Form->input('tag_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TweetsUser.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TweetsUser.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tweets Users'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Tweets'), array('controller' => 'tweets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tweet'), array('controller' => 'tweets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
