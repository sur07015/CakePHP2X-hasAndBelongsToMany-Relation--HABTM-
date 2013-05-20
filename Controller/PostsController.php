<?php
class PostsController extends AppController {
  
	public $name = 'Posts';
    
	public $uses = array('Post');
		
	public function index() {
		$this->set('title_for_layout', __('List of Post'));
		$this->Post->recursive = 1;
		$this->set('posts', $this->paginate());				
	}
	
	public function add(){ 
		$this->set('title_for_layout', __('Add Post'));
	
		if(!empty($this->request->data)) { 
				$this->Post->create();								
			if ($this->Post->save($this->request->data)){  					
				$this->Session->setFlash(__('The Post has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Post could not be saved. Please, try again.'), 'default', array('class' => 'error-message'));
		    }
		}			
		$this->set('tags', $this->Post->Tag->find('list'));
	}
	
	public function edit($id = null) {
		$this->set('title_for_layout', __('Edit Post'));
        
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Post'), 'default', array('class' => 'error-message'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {	
			$this->request->data['Post']['id'] = $id; 
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The Post has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Post could not be saved. Please, try again.'), 'default', array('class' => 'error-message'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Post->read(null, $id);
		}
		$this->set('tags', $this->Post->Tag->find('list'));
	}

	
	
	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Post'), 'default', array('class' => 'error-message'));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Post->delete($id)) {
			$this->Session->setFlash(__('Post deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
	}
	
}
?>
