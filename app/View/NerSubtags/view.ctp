<div class="nerSubtags view">
<h2><?php  echo __('Ner Subtag');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($nerSubtag['NerSubtag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($nerSubtag['NerSubtag']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ner Tag'); ?></dt>
		<dd>
			<?php echo $this->Html->link($nerSubtag['NerTag']['name'], array('controller' => 'ner_tags', 'action' => 'view', $nerSubtag['NerTag']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ner Subtag'), array('action' => 'edit', $nerSubtag['NerSubtag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ner Subtag'), array('action' => 'delete', $nerSubtag['NerSubtag']['id']), null, __('Are you sure you want to delete # %s?', $nerSubtag['NerSubtag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ner Subtags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ner Subtag'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ner Tags'), array('controller' => 'ner_tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ner Tag'), array('controller' => 'ner_tags', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tweets Users'), array('controller' => 'tweets_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tweets User'), array('controller' => 'tweets_users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Tweets Users');?></h3>
	<?php if (!empty($nerSubtag['TweetsUser'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tweet Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Position Tweet'); ?></th>
		<th><?php echo __('Linked'); ?></th>
		<th><?php echo __('Tag Id'); ?></th>
		<th><?php echo __('Ner Tag Id'); ?></th>
		<th><?php echo __('Ner Subtag Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($nerSubtag['TweetsUser'] as $tweetsUser): ?>
		<tr>
			<td><?php echo $tweetsUser['id'];?></td>
			<td><?php echo $tweetsUser['tweet_id'];?></td>
			<td><?php echo $tweetsUser['user_id'];?></td>
			<td><?php echo $tweetsUser['position_tweet'];?></td>
			<td><?php echo $tweetsUser['linked'];?></td>
			<td><?php echo $tweetsUser['tag_id'];?></td>
			<td><?php echo $tweetsUser['ner_tag_id'];?></td>
			<td><?php echo $tweetsUser['ner_subtag_id'];?></td>
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
