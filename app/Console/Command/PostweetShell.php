<?php
class PostweetShell extends AppShell {
	public $uses = array('Tweet','Postag');
    public function main() {

    	$tweet_list = $this->Tweet->find('list');
    	foreach($tweet_list as $id_tweet=>$val){
    		if(!$this->Postag->tweetExists($id_tweet)){
    			$tweet_hash = $this->Tweet->find('first',array('conditions'=>array('Tweet.id'=>$id_tweet)));
				$tweet = $tweet_hash["Tweet"]["tweet"];
				$this->postag($tweet,$tweet_hash["Tweet"]["id"]);
    		}

    	}
    }
    public function postag($tweet,$id){
		$tweet = escapeshellcmd($tweet);
		$cmd_after = "/Users/stephan/Documents/proyectos/mt/ner-twitter/rTagger/app/Vendor/tree-tagger";
		$cmd_before = getcwd();
		chdir($cmd_after);
		ob_start();
			$var = passthru("echo '$tweet' | cmd/tree-tagger-spanish");
			$output = ob_get_contents();
		ob_end_clean();
		echo $output;
		$lines = explode("\n",$output);
		foreach($lines as $line){
			$vals = explode("\t",$line);
			if(count($vals) == 3) {
				$save_pos = array();
				$save_pos['Postag']['tweet_id'] = $id;
				$save_pos['Postag']['word'] = $vals[0];
				$save_pos['Postag']['acron'] = $vals[1];
				$this->Postag->create();
				$this->Postag->save($save_pos);
			}
		}
		chdir($cmd_before);
		echo $tweet."\n";
	}
}