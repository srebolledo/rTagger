<?php
App::uses('AppController', 'Controller');
/**
 * Tweets Controller
 *
 * @property Tweet $Tweet
 */
class TweetsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		if($this->request->is('post')){
			pr($this->request->data);
			$conditions = array('Tweet.location'=>$this->request->data['Tweets']['locations']);
			$this->Tweet->recursive = 0;
			$this->set('tweets', $this->paginate('Tweet',$conditions));
		}
		else{
			$this->Tweet->recursive = 0;
			$this->set('tweets', $this->paginate());
		}
		$locations = $this->Tweet->find('all',array('fields'=>array('location'),'group'=>'location'));
		$tmp = array();
		foreach($locations as $location){
			$tmp[$location['Tweet']['location']] = $location['Tweet']['location'];
		}
		$this->set("locations",$tmp);
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Tweet->id = $id;
		if (!$this->Tweet->exists()) {
			throw new NotFoundException(__('Invalid tweet'));
		}
		$this->set('tweet', $this->Tweet->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tweet->create();
			if ($this->Tweet->save($this->request->data)) {
				$this->Session->setFlash(__('The tweet has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tweet could not be saved. Please, try again.'));
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
		$this->Tweet->id = $id;
		if (!$this->Tweet->exists()) {
			throw new NotFoundException(__('Invalid tweet'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tweet->save($this->request->data)) {
				$this->Session->setFlash(__('The tweet has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tweet could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Tweet->read(null, $id);
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
		$this->Tweet->id = $id;
		if (!$this->Tweet->exists()) {
			throw new NotFoundException(__('Invalid tweet'));
		}
		if ($this->Tweet->delete()) {
			$this->Session->setFlash(__('Tweet deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tweet was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function tweets_to_show($number = 10){
		/*Get last not reviewed tweet*/
		if($this->request->is('post')){
			foreach($this->request->data['Tweet'] as $data){
				$this->Tweet->id = $data['id'];
				$this->Tweet->saveField('used',$data['used']);
				$this->Tweet->id = $data['id'];
				$this->Tweet->saveField('reviewed','1');
			}
			$this->redirect(array('action'=>'tweets_to_show'));
		}

		$this->set('tweets',$this->Tweet->getTweets($number));
		$this->set('total',$this->Tweet->getTotal());
		$this->set('notReviewed',$this->Tweet->getReviewed(false));
		$this->set('reviewed',$this->Tweet->getReviewed(true));
		$this->set('used',$this->Tweet->getUsed());
	}
}
