<div class="nerTags view">
<h2><?php  echo __('Ner Tag');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($nerTag['NerTag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($nerTag['NerTag']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($nerTag['NerTag']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ner Tag'), array('action' => 'edit', $nerTag['NerTag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ner Tag'), array('action' => 'delete', $nerTag['NerTag']['id']), null, __('Are you sure you want to delete # %s?', $nerTag['NerTag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ner Tags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ner Tag'), array('action' => 'add')); ?> </li>
	</ul>
</div>
