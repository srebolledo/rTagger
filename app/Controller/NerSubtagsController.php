<?php
App::uses('AppController', 'Controller');
/**
 * NerSubtags Controller
 *
 * @property NerSubtag $NerSubtag
 */
class NerSubtagsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->NerSubtag->recursive = 0;
		$this->set('nerSubtags', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->NerSubtag->id = $id;
		if (!$this->NerSubtag->exists()) {
			throw new NotFoundException(__('Invalid ner subtag'));
		}
		$this->set('nerSubtag', $this->NerSubtag->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->NerSubtag->create();
			if ($this->NerSubtag->save($this->request->data)) {
				$this->Session->setFlash(__('The ner subtag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ner subtag could not be saved. Please, try again.'));
			}
		}
		$nerTags = $this->NerSubtag->NerTag->find('list');
		$this->set(compact('nerTags'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->NerSubtag->id = $id;
		if (!$this->NerSubtag->exists()) {
			throw new NotFoundException(__('Invalid ner subtag'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->NerSubtag->save($this->request->data)) {
				$this->Session->setFlash(__('The ner subtag has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ner subtag could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->NerSubtag->read(null, $id);
		}
		$nerTags = $this->NerSubtag->NerTag->find('list');
		$this->set(compact('nerTags'));
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
		$this->NerSubtag->id = $id;
		if (!$this->NerSubtag->exists()) {
			throw new NotFoundException(__('Invalid ner subtag'));
		}
		if ($this->NerSubtag->delete()) {
			$this->Session->setFlash(__('Ner subtag deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ner subtag was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
