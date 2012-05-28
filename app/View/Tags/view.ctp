<div class="tags view">
<h2><?php  echo __('Tag');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tag'), array('action' => 'edit', $tag['Tag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tag'), array('action' => 'delete', $tag['Tag']['id']), null, __('Are you sure you want to delete # %s?', $tag['Tag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tweets Users'), array('controller' => 'tweets_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tweets User'), array('controller' => 'tweets_users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Tweets Users');?></h3>
	<?php if (!empty($tag['TweetsUser'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tweet Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Position Tweet'); ?></th>
		<th><?php echo __('Linked'); ?></th>
		<th><?php echo __('Tag Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($tag['TweetsUser'] as $tweetsUser): ?>
		<tr>
			<td><?php echo $tweetsUser['id'];?></td>
			<td><?php echo $tweetsUser['tweet_id'];?></td>
			<td><?php echo $tweetsUser['user_id'];?></td>
			<td><?php echo $tweetsUser['position_tweet'];?></td>
			<td><?php echo $tweetsUser['linked'];?></td>
			<td><?php echo $tweetsUser['tag_id'];?></td>
			<td><?php echo $tweetsUser['created'];?></td>
			<td><?php echo $tweetsUser['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tweets_users', 'action' => 'view', $tweetsUser['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tweets_users', 'action' => 'edit', $tweetsUser['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tweets_users', 'action' => 'delete', $tweetsUser['id']), null, __('Are you sure you want to delete # %s?', $tweetsUser['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tweets User'), array('controller' => 'tweets_users', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
