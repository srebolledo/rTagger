<?php
App::uses('AppModel', 'Model');
/**
 * TweetsUser Model
 *
 * @property Tweet $Tweet
 * @property User $User
 * @property Tag $Tag
 */
class TweetsUser extends AppModel {
	public $currentUser = NULL;
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'tweet_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'position_tweet' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'linked' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tag_id' => array(
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tag' => array(
			'className' => 'Tag',
			'foreignKey' => 'tag_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'NerTag' => array(
			'className' => 'NerTag',
			'foreignKey' => 'ner_tag_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)

	);
	public function findNextTweet(){
		$tweet_id = TweetsUser::find('first',array('conditions'=>array('TweetsUser.user_id'=>$this->currentUser),'fields'=>array('TweetsUser.tweet_id'),'order'=>'TweetsUser.tweet_id desc'));
		if(!$tweet_id)	$tweet = $this->Tweet->find('first');
		else $tweet = $this->Tweet->find('first',array('conditions'=>array('Tweet.id'=>($tweet_id['TweetsUser']['tweet_id']+1) )));
		if($tweet)	return $tweet;
		else return false;
	}
	/*Function findTaggedTweets
		@param string $tweet_id => The tweet id in DB
		@return array with tweets tagged by taggers.

	*/
	public function findTaggedTweets($tweet_id){
		$tweets = $this->Tweet->find('all',array('conditions'=>array('Tweet.id'=>$tweet_id)));
		$tmp = array();
		$taggedTweets = array();
		foreach($tweets as $tweet){
			$tweet_parts = explode(" ",$tweet['Tweet']['tweet']);
			$this->unBindModel(array('belongsTo'=>array('Tweet')));
			$taggedTweet = $this->find('all',array('conditions'=>array('TweetsUser.tweet_id'=>$tweet_id),'order'=>array('user_id asc','position_tweet asc')));
			$tweets = array();
			$tweet = "";
			$prev = 0;
			$prevTag = '';
			foreach($taggedTweet as $tag){
				if(!array_key_exists($tag['TweetsUser']['user_id'], $tmp)) $tmp[$tag['TweetsUser']['user_id']] = '';
				if($prev == 1 && $tag['TweetsUser']['linked'] == 0) {
					$tmp[$tag['TweetsUser']['user_id']] .= "<span style='color:red;font-size:9px'>%/".$prevTag."%</span>";
					$prev = 0;
					$prevTag = '';
				}
				if($tag['Tag']['name'] != 'Ninguno' && $prev == 0)$tmp[$tag['TweetsUser']['user_id']] .= "<span style='color:red;font-size:8px'>%".$tag['Tag']['name']."%</span>";
					$tmp[$tag['TweetsUser']['user_id']] .= " ".$tweet_parts[($tag['TweetsUser']['position_tweet']-1)]." ";
				if($tag['Tag']['name'] != 'Ninguno' && $tag['TweetsUser']['linked'] == 1 && $prev == 0){
					$prev = 1;
					$prevTag = $tag['Tag']['name'];
				}
				else if($tag['Tag']['name'] != 'Ninguno' && $tag['TweetsUser']['linked'] == 0 && $prev == 0) $tmp[$tag['TweetsUser']['user_id']] .= "<span style='color:red;font-size:8px'>%/".$tag['Tag']['name']."%</span>";
			}
			if($prev == 1) $tmp[$tag['TweetsUser']['user_id']] .= "<span style='color:red;font-size:8px'>%/".$prevTag."%</span>";
			
		}
		$taggedTweets['pos'] = $tmp;
		$tmp = array();
		$tweets = $this->Tweet->find('all',array('conditions'=>array('Tweet.id'=>$tweet_id)));
		foreach($tweets as $tweet){
			$tweet_parts = explode(" ",$tweet['Tweet']['tweet']);
			$this->unBindModel(array('belongsTo'=>array('Tweet')));
			$taggedTweet = $this->find('all',array('conditions'=>array('TweetsUser.tweet_id'=>$tweet_id),'order'=>array('user_id asc','position_tweet asc')));
			$tweets = array();
			$tweet = "";
			$prev = 0;
			$prevTag = '';
			foreach($taggedTweet as $tag){
				if(!array_key_exists($tag['TweetsUser']['user_id'], $tmp)) $tmp[$tag['TweetsUser']['user_id']] = '';
				if($prev == 1 && $tag['TweetsUser']['linked'] == 0) {
					$tmp[$tag['TweetsUser']['user_id']] .= "<span style='color:green;font-size:9px'>%/".$prevTag."%</span>";
					$prev = 0;
					$prevTag = '';
				}
				if($tag['NerTag']['name'] != 'Ninguno' && $prev == 0)$tmp[$tag['TweetsUser']['user_id']] .= "<span style='color:green;font-size:8px'>%".$tag['NerTag']['name']."%</span>";
					$tmp[$tag['TweetsUser']['user_id']] .= " ".$tweet_parts[($tag['TweetsUser']['position_tweet']-1)]." ";
				if($tag['NerTag']['name'] != 'Ninguno' && $tag['TweetsUser']['linked'] == 1 && $prev == 0){
					$prev = 1;
					$prevTag = $tag['NerTag']['name'];
				}
				else if($tag['NerTag']['name'] != 'Ninguno' && $tag['TweetsUser']['linked'] == 0 && $prev == 0) $tmp[$tag['TweetsUser']['user_id']] .= "<span style='color:green;font-size:8px'>%/".$tag['NerTag']['name']."%</span>";
			}
			if($prev == 1) $tmp[$tag['TweetsUser']['user_id']] .= "<span style='color:green;font-size:8px'>%/".$prevTag."%</span>";
			
		}
		$taggedTweets['ner'] = $tmp;
		return $taggedTweets;

	}

}
