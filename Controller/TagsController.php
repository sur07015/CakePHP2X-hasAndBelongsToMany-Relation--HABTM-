<?php
App::uses('AppController', 'Controller');

class TagsController extends AppController {

  public $name = 'Tags';
	
	public function index() {
		$this->set('title_for_layout', __('List of Tag'));
		$this->Tag->recursive = 0;
		$this->set('tags', $this->paginate());		
	}
	
	public function add(){
		$this->set('title_for_layout', __('Add Tag'));
			if (!empty($this->request->data)) 
			{
				$this->Tag->create();
				if ($this->Tag->save($this->request->data)) 
				{
					$this->Session->setFlash(__('The Tag has been saved'), 'default', array('class' => 'success'));
					$this->redirect(array('action' => 'index'));
				} 
				else {$this->Session->setFlash(__('The Tag could not be saved. Please, try again.'), 'default', array('class' => 'error-message'));}
			}
	}

	public function edit($id = null) {
		$this->set('title_for_layout', __('Edit Tag'));
        
		if (!$id && empty($this->request->data)) {
			$this->Session->setFlash(__('Invalid Tag'), 'default', array('class' => 'error-message'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->data)) {		
			
			if ($this->Tag->save($this->request->data)) {
				$this->Session->setFlash(__('The Tag has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Tag could not be saved. Please, try again.'), 'default', array('class' => 'error-message'));
			}
		}
		if (empty($this->request->data)) {
			$this->request->data = $this->Tag->read(null, $id);
		}
	}

	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Tag'), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Tag->delete($id)) {
			$this->Session->setFlash(__('The Tag Has Been deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
	}
}
