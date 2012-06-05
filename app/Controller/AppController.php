<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $_title = "";
    public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session'
    );
    public $helpers = array('Html', 'Form', 'Session');

    public function beforeFilter() {
        //Configure AuthComponent
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'home');
    }
    public function beforeRender(){
        if($this->_title != ''){
            $this->set('title_for_layout',$this->_title." | rTagger: Etiquetador de textos cortos.");
        }
        else{
            $this->set('title_for_layout','rTagger: Etiquetador de textos cortos.');
        }
	    /*Automatic css and js load*/
	    $fileName = $this->params['controller'].".".$this->params['action'];
	    $_css = array();
	    $_js = array('jQuery');
	    if(file_exists("css/".$fileName.".css")){
			$_css[] = $fileName;
	    }
	    if(file_exists("js/".$fileName.".js")){
			$_js[] = $fileName;
	    }
	    $this->set('css',$_css);
	    $this->set('js',$_js);
    }
}
?>