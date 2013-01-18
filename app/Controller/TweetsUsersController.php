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

			foreach($this->request->data['TweetsUser'] as &$tweet_part){
				//echo $tweet_part['ner_subtag_id']."<br>";
				if($tweet_part['ner_subtag_id'] == '') $tweet_part['ner_subtag_id'] = '0';
				if($tweet_part['ner_subtag_id'] != '0'){
					//echo $tweet_part['ner_subtag_id']."<br>";
					$count = $this->TweetsUser->NerSubtag->find('count',array('conditions'=>array('NerSubtag.id'=>$tweet_part['ner_subtag_id'])));
					if($count == 0){
						//Debo agregar el subtag y traer el id
						$tmp = array();
						$tmp['name'] = $tweet_part['ner_subtag_id'];
						$tmp['ner_tag_id'] = $tweet_part['ner_tag_id'];
						$this->TweetsUser->NerSubtag->save($tmp);
						$tweet_part['ner_subtag_id'] = $this->TweetsUser->NerSubtag->getLastInsertId();
					}
				}

			}

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
		$nerSubtags = array();
		foreach($nerTags as $key => $ner){
			$tmp = $this->TweetsUser->NerSubtag->find('list',array('conditions'=>array('NerSubtag.ner_tag_id'=>$key)));
			$nerSubtags[$key] = $tmp;
		}
		$this->set(compact('user', 'tags','tweet','nerTags','nerSubtags'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		// $this->TweetsUser->id = $id;
		// if (!$this->TweetsUser->exists()) {
		// 	throw new NotFoundException(__('Invalid tweets user'));
		// }
		if ($this->request->is('post') || $this->request->is('put')) {
			foreach($this->request->data as $data){
				foreach($data as $item){
					$this->TweetsUser->id = $item['id'];
					$this->TweetsUser->save($item);
				}

			}
				$this->redirect('edit');
		}

		$tweet = $this->TweetsUser->findNextTweet();
		
		$tweetUsers = $this->TweetsUser->findTaggedTweet($tweet['Tweet']['id']);
		$user = $this->Auth->user('id');
		$tags = $this->TweetsUser->Tag->find('list');
		$nerTags = $this->TweetsUser->NerTag->find('list');
		$nerSubtags = array();
		foreach($nerTags as $key => $ner){
			$tmp = $this->TweetsUser->NerSubtag->find('list',array('conditions'=>array('NerSubtag.ner_tag_id'=>$key)));
			$nerSubtags[$key] = $tmp;
		}
		$this->set(compact('tweetUsers', 'user', 'tags','tweet','nerTags','nerSubtags'));

		//$this->set(compact('tweet', 'users', 'tags'));
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
