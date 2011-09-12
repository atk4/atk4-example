<?php
/**
  * Page displaying our blog index
  */
class page_index extends Page {
    function init(){
        parent::init();

        // We have moved functionality of blog list into a different view. It's
        // defined down  below, because we don't really use it on any other page.
        $lister = $this->add('MyBlog',null,'Posts','Posts');

        // Lister can fetch all the data from the table
        $lister->setSource('blog_post');
        $lister->dq->order('date',true)->limit(5);  // Show only last 5 posts

        $this->add('View_Archive',null,'Archive');
    }
    function defaultTemplate(){
        return array('page/index');
    }
}
class MyBlog extends CompleteLister {
    function formatRow(){
        $this->current_row['intro']=substr($this->current_row['body'],0,300);
        $this->current_row['link']=$this->api->getDestinationURL('read',array('id'=>$this->current_row['id']));
    }
}
