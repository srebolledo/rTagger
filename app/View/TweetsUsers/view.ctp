<div class="tweetsUsers view">
<h2><?php  echo __('Viendo un tweet etiquetado');?></h2>
	
	
	<?php
		foreach($tweet as $t){
			echo "<div id='tweet'>";
			echo $t;
			echo "</div>";
			
		} 
		?>
		
</div>
	
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tweets User'), array('action' => 'edit', $tweetsUser['TweetsUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tweets User'), array('action' => 'delete', $tweetsUser['TweetsUser']['id']), null, __('Are you sure you want to delete # %s?', $tweetsUser['TweetsUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tweets Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tweets User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tweets'), array('controller' => 'tweets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tweet'), array('controller' => 'tweets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
