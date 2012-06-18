<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail','Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 */

class UsersController extends AppController {



public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('register');

}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
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
				$this->Session->setFlash(__('The user has been saved'));
				
				$this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	public function login(){
		$this->layout = 'login';
	    if ($this->request->is('post')) {
       		if ($this->Auth->login()) {

	            $this->redirect($this->Auth->redirect());
    	    } else {
        	    $this->Session->setFlash('Your username or password was incorrect.');
        	}	
    	}
	}
	public function logout() {
		$this->Session->setFlash('Good-Bye');
		$this->redirect($this->Auth->logout());
	}
	public function initDB() {
	    $group = $this->User->Group;
	    //Allow admins to everything
	    $group->id = 1;
	    $this->Acl->allow($group, 'controllers');

	    $group->id = 2;
	    $this->Acl->deny($group, 'controllers');
	    $this->Acl->allow($group, 'controllers/Tweets/index');
	    $this->Acl->allow($group, 'controllers/TweetsUsers/add');
  	    $this->Acl->allow($group, 'controllers/TweetsUsers/view');
   	    $this->Acl->allow($group, 'controllers/Users/login');
	    $this->Acl->allow($group, 'controllers/Users/logout');
	   	$this->Acl->allow($group, 'controllers/Pages/display');

	    exit;
	}
	public function register(){
		if ($this->request->is('post')) {
			$this->request->data['User']['group_id'] = 2; //always two to get the tagger user
			if($this->request->data['User']['password'] != $this->request->data['User']['password2']){
				$this->Session->setFlash('Las contraseñas no coinciden');
				$this->redirect(array('action'=>'register'));
			}
			$this->User->create();
			
			if ($this->User->save($this->request->data)) {
				$email = new CakeEmail();
				//$email->config = array('gmail');
				$email->from(array('rTagger@ia.udec.cl'=>'rTagger'));
				$email->to(array('srebolledo@gmail.com'));
				$email->subject('Test');
				$email->send('Esto es una prueba');
				$this->Session->setFlash(__('Has sido registrado'));
				$this->redirect(array('controller'=>'users','action' => 'login'));
			} else {
				$this->Session->setFlash(__('Tu usuario no pudo ser guardado.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	
}
