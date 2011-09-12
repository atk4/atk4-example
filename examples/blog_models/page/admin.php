<?php

/**
  * This page demonstrates UI implementation without reliance on Models. 
  *
  */
class page_admin extends Page {
    function init(){
        parent::init();

        // Add jQuery UI
        $this->add('jUI');
        
        // Add universal function chain
        $this->js()->_load('atk4_univ')->_load('ui.atk4_notify');

        // Check username / password 
        $this->api->auth->check();

        $crud = $this->add('CRUD');
        $crud->setModel('BlogPost');
    }
}
