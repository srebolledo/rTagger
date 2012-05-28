<div class="tweets index">
	<h2><?php echo __('Tweets');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('date');?></th>
			<th><?php echo $this->Paginator->sort('checksum');?></th>
			<th><?php echo $this->Paginator->sort('tweet_reference');?></th>
			<th><?php echo $this->Paginator->sort('field6');?></th>
			<th><?php echo $this->Paginator->sort('field7');?></th>
			<th><?php echo $this->Paginator->sort('field8');?></th>
			<th><?php echo $this->Paginator->sort('field9');?></th>
			<th><?php echo $this->Paginator->sort('tweet');?></th>
			<th><?php echo $this->Paginator->sort('language');?></th>
			<th><?php echo $this->Paginator->sort('location');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		echo $this->Form->create("Tweets");
		echo $this->Form->input("locations");
		echo $this->Form->end("Submit");
	?>
	<?php
	foreach ($tweets as $tweet): ?>
	<tr>
		<td><?php echo h($tweet['Tweet']['id']); ?>&nbsp;</td>
		<td><?php echo h($tweet['Tweet']['user']); ?>&nbsp;</td>
		<td><?php echo h($tweet['Tweet']['status']); ?>&nbsp;</td>
		<td><?php echo h($tweet['Tweet']['date']); ?>&nbsp;</td>
		<td><?php echo h($tweet['Tweet']['checksum']); ?>&nbsp;</td>
		<td><?php echo h($tweet['Tweet']['tweet_reference']); ?>&nbsp;</td>
		<td><?php echo h($tweet['Tweet']['field6']); ?>&nbsp;</td>
		<td><?php echo h($tweet['Tweet']['field7']); ?>&nbsp;</td>
		<td><?php echo h($tweet['Tweet']['field8']); ?>&nbsp;</td>
		<td><?php echo h($tweet['Tweet']['field9']); ?>&nbsp;</td>
		<td><?php echo h($tweet['Tweet']['tweet']); ?>&nbsp;</td>
		<td><?php echo h($tweet['Tweet']['language']); ?>&nbsp;</td>
		<td><?php echo h($tweet['Tweet']['location']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tweet['Tweet']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tweet['Tweet']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tweet['Tweet']['id']), null, __('Are you sure you want to delete # %s?', $tweet['Tweet']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tweet'), array('action' => 'add')); ?></li>
	</ul>
</div>
