  <?php if(!empty($tags)): ?>
		<?php echo $this->Html->link('Add New Tag', array('controller' => 'tags', 'action' => 'add')); ?>
			<table cellpadding="0" cellspacing="0" >
				<?php
					$tableHeaders =  $this->Html->tableHeaders(array(
						$this->Paginator->sort('id','ID'),						
						$this->Paginator->sort('title','Title'),						                  
						$this->Paginator->sort('created','Created'),
						$this->Paginator->sort('modified','Modified'),
						__('Actions', true),
					));
					echo $tableHeaders;
					$rows = array();
					foreach ($tags AS $tag) {
						$actions  = $this->Html->link(__('Edit', true), array('controller' => 'tags', 'action' => 'edit', $tag['Tag']['id']));
						$actions .= ' ' . $this->Form->postLink(__('Delete', true), array(
							'controller' => 'tags',
							'action' => 'delete',
							$tag['Tag']['id'],
						), null, __('Are you sure?', true));					
						
						$created  = $tag['Tag']['created'];
						$modified = $tag['Tag']['modified'];
						
						$rows[] = array(
							$tag['Tag']['id'],							
							$tag['Tag']['title'],							
							$created, 
							$modified,
							$actions,
						);
					}
					echo $this->Html->tableCells($rows);
					echo $tableHeaders;
				?>
			</table>
	   
			<?php if ($pagingBlock = $this->fetch('paging')): ?>
				<?php echo $pagingBlock; ?>
			<?php else: ?>
				<?php if (isset($this->Paginator) && isset($this->request['paging'])): ?>
					<div class="paging">
						<?php echo $this->Paginator->first('< ' . __('first')); ?>
						<?php echo $this->Paginator->prev('< ' . __('prev')); ?>
						<?php echo $this->Paginator->numbers(); ?>
						<?php echo $this->Paginator->next(__('next') . ' >'); ?>
						<?php echo $this->Paginator->last(__('last') . ' >'); ?>
					</div>
					<div class="counter"><?php echo $this->Paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%'))); ?></div>
				<?php endif; ?>
			<?php endif; ?>
	<?php endif ;?>
