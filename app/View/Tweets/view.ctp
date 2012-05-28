<div class="tweets view">
<h2><?php  echo __('Tweet');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tweet['Tweet']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo h($tweet['Tweet']['user']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($tweet['Tweet']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($tweet['Tweet']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Checksum'); ?></dt>
		<dd>
			<?php echo h($tweet['Tweet']['checksum']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tweet Reference'); ?></dt>
		<dd>
			<?php echo h($tweet['Tweet']['tweet_reference']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Field6'); ?></dt>
		<dd>
			<?php echo h($tweet['Tweet']['field6']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Field7'); ?></dt>
		<dd>
			<?php echo h($tweet['Tweet']['field7']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Field8'); ?></dt>
		<dd>
			<?php echo h($tweet['Tweet']['field8']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Field9'); ?></dt>
		<dd>
			<?php echo h($tweet['Tweet']['field9']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tweet'); ?></dt>
		<dd>
			<?php echo h($tweet['Tweet']['tweet']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language'); ?></dt>
		<dd>
			<?php echo h($tweet['Tweet']['language']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($tweet['Tweet']['location']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tweet'), array('action' => 'edit', $tweet['Tweet']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tweet'), array('action' => 'delete', $tweet['Tweet']['id']), null, __('Are you sure you want to delete # %s?', $tweet['Tweet']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tweets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tweet'), array('action' => 'add')); ?> </li>
	</ul>
</div>
