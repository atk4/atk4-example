<?php
/*
   Commonly you would want to re-define ApiFrontend for your own application.
 */
class Frontend extends ApiFrontend {
	function init(){
		parent::init();
		// Keep this if you are going to use database on all pages
		//$this->dbConnect();

		// This will add some resources from atk4-addons, which would be located
        // in atk4-addons subdirectory.
		$this->addLocation('atk4-addons',array(
					'php'=>array(
                        'mvc',
						'misc/lib',
						)
					))
			->setParent($this->pathfinder->base_location);

		// A lot of the functionality in Agile Toolkit requires jUI
		$this->add('jUI');

		// Initialize any system-wide javascript libraries here
        // If you are willing to write custom JavaScritp code,
        // place it into templates/js/atk4_univ_ext.js and
        // include it here
		$this->js()
			->_load('atk4_univ')
			// ->_load('ui.atk4_expander')
			;

		// If you wish to restrict actess to your pages, use BasicAuth class
        /*
		$this->add('BasicAuth')
			->allow('demo','demo')
			->check()
			;
         */


        // Initialize objects which you want to see on ALL of your pages in this method
        // If you, however, want to place object only on a single page, then
        // create page/mytestpage.php with class page_mytestpage and put objects
        // into it's init() method.

        // Menu:

		// If you are using a complex menu, you can re-define
		// it and place in a separate class
		$m=$this->add('Menu',null,'Menu');
		$m->addMenuItem('Welcome','index');
		$m->addMenuItem('How Do I..?','how');
		$m->addMenuItem('about');
		$m->addMenuItem('logout');

		// If you want to use ajax-ify your menu
		// $m->js(true)->_load('ui.atk4_menu')->atk4_menu(array('content'=>'#Content'));

        // Finally if you want to use a simple menu, you can either put it into shared.html
        // or include it from other file
        // $m=$this->add('Menu',null,'Menu',array('view/mymenu'));


        // Checks for ATK upgrades and shows current version
        $this->add('UpgradeChecker',null,'version');

        // You need to call initLayout which will determine current page and load
        // respective page/...php class.
        $this->initLayout();
	}

	function page_pref($p){
		$this->dbConnect();
				
		// This is example of how you can use form with MVC support
		$p->frame('Preferences')->add('MVCForm')
			->setController('Controller_User');
	}
}
