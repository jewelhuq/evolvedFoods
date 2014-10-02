<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Role $Role
 */
class User extends AppModel {
	const TEMP_PASSWORD = 'password';
	const TEMP_USERNAME = 'username';
	
	public $actsAs = array('Acl' => array('type' => 'requester', 'enabled' => false));
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'role_id' => array(
			'numeric' => array(
				'rule' => array('numeric')
			),
		),
		'first_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'last_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email')
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }
	
	public function bindNode($user) {
    return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
}
	public function beforeSave($options = array()) {
		$this->data['User']['password'] = AuthComponent::password(
			$this->data['User']['password']
		);
		return true;
		
		parent::beforeSave($options);
	}
}
