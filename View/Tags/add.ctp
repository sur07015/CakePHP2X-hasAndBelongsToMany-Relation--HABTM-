<div class="tags form">
<?php echo $this->Form->create('Tag'); ?>
  <fieldset>
		<legend><?php echo __('Add Tag'); ?></legend>
		<?php echo $this->Form->input('label'); ?>
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
