<?php
App::uses('AppModel', 'Model');
/**
 * Postag Model
 *
 * @property Tweet $Tweet
 * @property Tag $Tag
 */
class Postag extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'tweet_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Tweet' => array(
			'className' => 'Tweet',
			'foreignKey' => 'tweet_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

	public function tweetExists($tweet_id = null){
		if($tweet_id){
			$tweet = $this->find('count',array('conditions'=>array('Tweet.id'=>$tweet_id)));
			if($tweet == 0) return false;
			else return true;
		}


	}
}
