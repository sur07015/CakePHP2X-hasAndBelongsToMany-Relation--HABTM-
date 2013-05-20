<?php echo $this->Html->link('Add New Post', array('controller' => 'posts', 'action' => 'add')); ?>
  <?php if(!empty($posts)): ?>
			<table cellpadding="0" cellspacing="0" >
				<?php
					$tableHeaders =  $this->Html->tableHeaders(array(
						$this->Paginator->sort('id'),
						$this->Paginator->sort('Title'),																
						$this->Paginator->sort('status'),                    
						$this->Paginator->sort('created'),
						$this->Paginator->sort('modified'),						
						__('Actions', true),
					));
					echo $tableHeaders;
					$rows = array();
					foreach ($posts AS $post) {
						
						$status = $post['Post']['status'];     
						if($status==1){
							$st = $this->Html->image('icons/tick.png');
							
						} else {
							$st = $st=$this->Html->image('icons/cross.png');
							
						}
					
						$actions = $this->Html->link(__('Edit', true), array('controller' => 'posts', 'action' => 'edit', $post['Post']['id']));
						$actions .= ' ' . $this->Form->postLink(__('Delete', true), array(
							'controller' => 'posts',
							'action' => 'delete',
							$post['Post']['id'],
						), null, __('Are you sure?', true));					
						
						$rows[] = array(
							$post['Post']['id'],
							$post['Post']['title'],																			
							$st,	
							$post['Post']['created'],
							$post['Post']['modified'],
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
</div>
