<?php
App::uses('Postag', 'Model');

/**
 * Postag Test Case
 *
 */
class PostagTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.postag', 'app.tweet', 'app.tag', 'app.tweets_user', 'app.user', 'app.group', 'app.ner_tag', 'app.ner_subtag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Postag = ClassRegistry::init('Postag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Postag);

		parent::tearDown();
	}

}
