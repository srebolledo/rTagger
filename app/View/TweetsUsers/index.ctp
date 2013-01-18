<div class="tweetsUsers index">
	<h2><?php echo __('Tweets Users');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('tweet_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('position_tweet');?></th>
			<th><?php echo $this->Paginator->sort('linked');?></th>
			<th><?php echo $this->Paginator->sort('tag_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($tweetsUsers as $tweetsUser): ?>
	<tr>
		<td><?php echo h($tweetsUser['TweetsUser']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tweetsUser['Tweet']['tweet'], array('controller' => 'tweets', 'action' => 'view', $tweetsUser['Tweet']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tweetsUser['User']['id'], array('controller' => 'users', 'action' => 'view', $tweetsUser['User']['id'])); ?>
		</td>
		<td><?php echo h($tweetsUser['TweetsUser']['position_tweet']); ?>&nbsp;</td>
		<td><?php echo h($tweetsUser['TweetsUser']['linked']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tweetsUser['Tag']['name'], array('controller' => 'tags', 'action' => 'view', $tweetsUser['Tag']['id'])); ?>
		</td>
		<td><?php echo h($tweetsUser['TweetsUser']['created']); ?>&nbsp;</td>
		<td><?php echo h($tweetsUser['TweetsUser']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tweetsUser['TweetsUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tweetsUser['TweetsUser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tweetsUser['TweetsUser']['id']), null, __('Are you sure you want to delete # %s?', $tweetsUser['TweetsUser']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Tweets User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tweets'), array('controller' => 'tweets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tweet'), array('controller' => 'tweets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
