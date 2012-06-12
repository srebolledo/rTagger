<?php
App::uses('AppController', 'Controller');
/**
 * TweetsUsers Controller
 *
 * @property TweetsUser $TweetsUser
 */
class TweetsUsersController extends AppController {
 	function beforeFilter(){
  		parent::beforeFilter();
 	 	$this->TweetsUser->currentUser = $this->Auth->user('id');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->_title = "Lista de tweets";
		$this->TweetsUser->recursive = 0;
		$this->set('tweetsUsers', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TweetsUser->Tweet->id = $id;
		if (!$this->TweetsUser->Tweet->exists()) {
			throw new NotFoundException(__('Invalid tweets user'));
		}
		$this->set('tweet',$this->TweetsUser->findTaggedTweets($id));
		$this->set('tweet_id',$id);
		$this->set('tweetsUser', $this->TweetsUser->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->_title = "Etiquetando un nuevo tweet";
		if ($this->request->is('post')) {
			$this->TweetsUser->create();
			if ($this->TweetsUser->saveAll($this->request->data['TweetsUser'])){
				$this->Session->setFlash(__('The tweets user has been saved'));
				$this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The tweets user could not be saved. Please, try again.'));
			}
		}
		$tweet = $this->TweetsUser->findNextTweet();
		$user = $this->Auth->user('id');
		$tags = $this->TweetsUser->Tag->find('list');
		$nerTags = $this->TweetsUser->NerTag->find('list');
		$this->set(compact('user', 'tags','tweet','nerTags'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TweetsUser->id = $id;
		if (!$this->TweetsUser->exists()) {
			throw new NotFoundException(__('Invalid tweets user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TweetsUser->save($this->request->data)) {
				$this->Session->setFlash(__('The tweets user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tweets user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TweetsUser->read(null, $id);
		}
		$tweets = $this->TweetsUser->Tweet->find('list');
		$users = $this->TweetsUser->User->find('list');
		$tags = $this->TweetsUser->Tag->find('list');

		$this->set(compact('tweets', 'users', 'tags'));
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
		$this->TweetsUser->id = $id;
		if (!$this->TweetsUser->exists()) {
			throw new NotFoundException(__('Invalid tweets user'));
		}
		if ($this->TweetsUser->delete()) {
			$this->Session->setFlash(__('Tweets user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tweets user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function seetTagged(){

	}

}
