<?php
App::uses('AppController', 'Controller');
/**
 * NerTags Controller
 *
 * @property NerTag $NerTag
 */
class NerTagsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->NerTag->recursive = 0;
		$this->set('nerTags', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->NerTag->id = $id;
		if (!$this->NerTag->exists()) {
			throw new NotFoundException(__('Invalid ner tag'));
		}
		$this->set('nerTag', $this->NerTag->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->NerTag->create();
			if ($this->NerTag->save($this->request->data)) {
				$this->Session->setFlash(__('The ner tag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ner tag could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->NerTag->id = $id;
		if (!$this->NerTag->exists()) {
			throw new NotFoundException(__('Invalid ner tag'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->NerTag->save($this->request->data)) {
				$this->Session->setFlash(__('The ner tag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ner tag could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->NerTag->read(null, $id);
		}
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
		$this->NerTag->id = $id;
		if (!$this->NerTag->exists()) {
			throw new NotFoundException(__('Invalid ner tag'));
		}
		if ($this->NerTag->delete()) {
			$this->Session->setFlash(__('Ner tag deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ner tag was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
