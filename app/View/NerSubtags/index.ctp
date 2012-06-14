<div class="nerSubtags index">
	<h2><?php echo __('Ner Subtags');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('ner_tag_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($nerSubtags as $nerSubtag): ?>
	<tr>
		<td><?php echo h($nerSubtag['NerSubtag']['id']); ?>&nbsp;</td>
		<td><?php echo h($nerSubtag['NerSubtag']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($nerSubtag['NerTag']['name'], array('controller' => 'ner_tags', 'action' => 'view', $nerSubtag['NerTag']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $nerSubtag['NerSubtag']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $nerSubtag['NerSubtag']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $nerSubtag['NerSubtag']['id']), null, __('Are you sure you want to delete # %s?', $nerSubtag['NerSubtag']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ner Subtag'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ner Tags'), array('controller' => 'ner_tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ner Tag'), array('controller' => 'ner_tags', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tweets Users'), array('controller' => 'tweets_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tweets User'), array('controller' => 'tweets_users', 'action' => 'add')); ?> </li>
	</ul>
</div>
