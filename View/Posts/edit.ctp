<div class="posts form">
<?php echo $this->Form->create('Post'); ?>
  <fieldset>
		<legend><?php echo __('Edit Post'); ?></legend>
		<?php echo $this->Form->input('id'); ?>
		<?php echo $this->Form->input('name'); ?>
		<?php echo $this->Form->input('Post.Tag',array('options' => $tags, 'multiple' =>'multiple')); ?>
		<?php echo $this->Form->input('description'); ?>
	</fieldset>
	
	<div class="buttons">
		<?php
			echo $this->Form->end(__('Save'));
			echo $this->Html->link(__('Cancel'), 
									array('action' => 'index',), 
									array('class' => 'cancel',)
									);
		?>
	</div>
</div>
