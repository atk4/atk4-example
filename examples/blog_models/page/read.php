<?php
/**
  * Page for displaying individual blog entry. 
  */
class page_read extends Page {
    function init(){
        parent::init();

        $view = $this->add('View',null,'Post','Post');
        $view->setModel('BlogPost')->loadData($_GET['id']);

        $view->template->set('body',nl2br($view->template->get('body')));

        // Add our Archive widget
        $this->add('View_Archive',null,'Archive');
    }
    function defaultTemplate(){
        return array('page/read');
    }
}
