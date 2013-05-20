<?php
App::uses('AppModel', 'Model');

class Post extends AppModel {

  public $name = 'Post';

	public $validate = array(
		'title' => array(
			'notEmpty' => array ( 
				'rule' => 'notEmpty',
				'message' => 'Please Provide a Title.',
				'allowEmpty' => false,
      	  		'required' => true,
			),
		),
		
		'Tag' => array(
		  'multiple' => array(
			'rule' => array('multiple', array('min' => 1)),
			'message' => 'You need to select at least one tag',
			'required' => true,
			'allowEmpty' => false,
		  ),
		),
	);
	  
	public $hasAndBelongsToMany = array(
				'Tag' => array(
				  'className' => 'Tag',
				  'joinTable' => 'posts_tags',
				  'foreignKey' => 'post_id',
				  'associationForeignKey' => 'tag_id',
				  'unique' => false,
        ),
	);	
	
	public function beforeSave($options = array()){
		foreach (array_keys($this->hasAndBelongsToMany) as $model){
		  if(isset($this->data[$this->name][$model])){
			$this->data[$model][$model] = $this->data[$this->name][$model];
			unset($this->data[$this->name][$model]);
		  }
		}
		return true;
	}
}
