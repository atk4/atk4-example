<?php
/**
  * Page for displaying individual blog entry. 
  */
class page_read extends Page {
    function init(){
        parent::init();

        $data=$this->api->db->dsql()->table('blog_post')
            ->field('*')
            ->where('id',$_GET['id'])
            ->do_getHash();

        // If no data, thow exception
        if(!$data)throw $this->exception('No such blog post');

        // To output data we are using a generic view with Post template. Template
        // is taken from the "Post" tag of the page's template. Output will replace
        // tag contents
        $view = $this->add('View',null,'Post','Post');
        $view->template->setHTML($data);

        // Add our Archive widget
        $this->add('View_Archive',null,'Archive');
    }
    function defaultTemplate(){
        return array('page/read');
    }
}
