<?php
App::uses('AppModel', 'Model');

class Tag extends AppModel {

  public $name = 'Tag';

	public $validate = array(
	
		'label' => array(
			'notEmpty' => array ( 
				'rule' => 'notEmpty',
				'message' => 'Please Provide a Title.',
				'allowEmpty' => false,
      	  		'required' => true,
			),
		),
		
		
	);
}
