<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session');
	
	/** TO-DO::Remove when the login functionality is complete. **/
	public function beforeFilter() {
		parent::beforeFilter();

		// For CakePHP 2.1 and up
		$this->Auth->allow();
	}
	
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			}
			$this->Session->setFlash(__('Your username or password was incorrect.'));
		}
	}

	public function logout() {
		//Leave empty for now.
	}
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

	/**
	 * Contact form for new users.  Creates a new User based on their form information.  User has a specific 
	 * "new user" role and placeholders for username and password.  
	 * @param bool $sent - indicates if the form is new or being loaded after information has been sent.
	 * @return void
	 */
	public function contact($sent = false) {
		if ($this->request->is('post')) {
			$this->loadModel('Role');
			$this->loadModel('User');
			
			//set the User up as a NEW USER
			$this->request->data['User']['role_id'] = Role::NEW_USER;
			
			//add a temp username and password
			$this->request->data['User']['username'] = User::TEMP_USERNAME;
			$this->request->data['User']['password'] = User::TEMP_PASSWORD;
			
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$Email = new CakeEmail();
				$Email->config('gmail');
				//TO-DO:: Figure out the proper configuration for using GreenGeeks webmail
				//$Email->config('unlessWeb');
				$Email->from(array($this->request->data['User']['email'] => $this->request->data['User']['first_name']));
				$Email->to('jasmun@unlessweb.com');
				$Email->subject('Someone is interested in Evolved Foods....');
				$Email->replyTo($this->request->data['User']['email']);
				$Email->send($this->request->data['User']['message']);
				return $this->redirect(array('action' => 'contact', true));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$this->set('sent', $sent);
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
