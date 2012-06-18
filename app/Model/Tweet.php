<?php
App::uses('AppModel', 'Model');
/**
 * Tweet Model
 *
 */
class Tweet extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'tweet';

	/*Method to get the next tweet from the pool of tweets*/
	public function getTweet(){
		return $this->find('first',array('conditions'=>array('Tweet.reviewed'=>0),'order'=>array('Tweet.id asc')));
	}
	public function getTotal(){
		return $this->find('count');
	}
	public function getNotReviewed(){
		return $this->find('count',array('conditions'=>array('Tweet.reviewed'=>0)));	
	}
}
