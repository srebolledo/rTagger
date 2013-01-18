<?php
App::uses('AppController', 'Controller');
/**
 * Postags Controller
 *
 * @property Postag $Postag
 */
class PostagsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Postag->recursive = 0;
		$this->set('postags', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Postag->id = $id;
		if (!$this->Postag->exists()) {
			throw new NotFoundException(__('Invalid postag'));
		}
		$this->set('postag', $this->Postag->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Postag->create();
			if ($this->Postag->save($this->request->data)) {
				$this->Session->setFlash(__('The postag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The postag could not be saved. Please, try again.'));
			}
		}
		$tweets = $this->Postag->Tweet->find('list');
		$tags = $this->Postag->Tag->find('list');
		$this->set(compact('tweets', 'tags'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Postag->id = $id;
		if (!$this->Postag->exists()) {
			throw new NotFoundException(__('Invalid postag'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Postag->save($this->request->data)) {
				$this->Session->setFlash(__('The postag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The postag could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Postag->read(null, $id);
		}
		$tweets = $this->Postag->Tweet->find('list');
		$tags = $this->Postag->Tag->find('list');
		$this->set(compact('tweets', 'tags'));
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
		$this->Postag->id = $id;
		if (!$this->Postag->exists()) {
			throw new NotFoundException(__('Invalid postag'));
		}
		if ($this->Postag->delete()) {
			$this->Session->setFlash(__('Postag deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Postag was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
