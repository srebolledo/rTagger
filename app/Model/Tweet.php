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
	//Get $numbers of tweets.
	public function getTweets($number = 10){
		return $this->find('all',array('conditions'=>array('Tweet.reviewed'=>0),'order'=>array('Tweet.id asc'),'limit'=>$number));
	}
	public function getTotal(){
		return $this->find('count');
	}
	public function getUsed(){
		return $this->find('count',array('conditions'=>array('Tweet.used'=>1)));
	}
	public function getReviewed($reviewed = false){
		if($reviewed) return $this->find('count',array('conditions'=>array('Tweet.reviewed'=>1)));
		else return $this->find('count',array('conditions'=>array('Tweet.reviewed'=>0)));
		
	}

}
