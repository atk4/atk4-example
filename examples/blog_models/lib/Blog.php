<?php
class Blog extends ApiFrontend {
    function init(){
        parent::init();

        $this->dbConnect();

        $this->addLocation('../atk4-addons',array(
                    'php'=>array(
                        'mvc',
                        'misc/lib',
                        )
                    ))
            ->setParent($this->pathfinder->atk_location);

        $menu = $this->add('Menu',null,'Menu');
        $menu->addMenuItem('index','Blog');
        $menu->addMenuItem($this->api->url('/')->setBaseURL('..'),'Back');
        $menu->addMenuItem('admin');

        // I define auth class here, but I am not checking auth yet.
        $this->auth = $this->add('BasicAuth')->allow('demo','demo');

        if($this->auth->isLoggedIn())$menu->addMenuItem('logout');
    }
    /** 
      * getIndexPage() tells auth class where to send user after login or logout. We make it so that user stays
      * on same page during login, but goes to index after logout
      */
    function getIndexPage(){
        if($this->page=='logout')return 'index';
        return $this->page;
    }
}
