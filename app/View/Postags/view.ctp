<div class="postags view">
<h2><?php  echo __('Postag');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($postag['Postag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tweet'); ?></dt>
		<dd>
			<?php echo $this->Html->link($postag['Tweet']['tweet'], array('controller' => 'tweets', 'action' => 'view', $postag['Tweet']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($postag['Postag']['position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo $this->Html->link($postag['Tag']['name'], array('controller' => 'tags', 'action' => 'view', $postag['Tag']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($postag['Postag']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($postag['Postag']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Postag'), array('action' => 'edit', $postag['Postag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Postag'), array('action' => 'delete', $postag['Postag']['id']), null, __('Are you sure you want to delete # %s?', $postag['Postag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Postags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Postag'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tweets'), array('controller' => 'tweets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tweet'), array('controller' => 'tweets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
