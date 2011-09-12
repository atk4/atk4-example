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
    }
    // page_index(){
    function initMainPage(){

        $grid = $this->add('Grid');
        $grid->addColumn('text','id');
        $grid->addColumn('text','title');
        $grid->addColumn('date','date');

        $grid->addColumn('button','edit');
        $grid->addColumn('delete','delete');

        if($_GET['edit']){
            $this->js()->univ()
                ->redirect($this->api->getDestinationURL('./edit',array('id'=>$_GET['edit'])))
                ->execute();
        }

        $grid->setSource('blog_post');
        $grid->dq->order('date',true);


        $grid->addButton('Add blog post')->js('click')->univ()->redirect('./add');
    }
    function page_add(){

        $form = $this->add('Frame')->setTitle('Add a new blog psot')->add('Form');

        $form->setFormClass('vertical');
        $form->addField('line','title');
        $form->addField('text','body');
        $form->addSubmit();
        $form->addButton('Cancel')->js('click')->univ()->redirect('..');

        $form->setSource('blog_post');

        if($form->isSubmitted()){
            $form->dq->set('date',date('Ymd'));
            $form->dq->debug();
            $form->update();
            $form->js()->univ()->redirect('..')->execute();
        }
    }
    function page_edit(){

        $this->api->stickyGET('id');

        $form = $this->add('Frame')->setTitle('Add a new blog psot')->add('Form');
        $form->setFormClass('vertical');
        $form->addField('line','title');
        $form->addField('text','body');
        $form->addField('DatePicker','date');
        $form->addSubmit();
        $form->addButton('Cancel')->js('click')->univ()->redirect('..');

        $form->setSource('blog_post');
        $form->setConditionFromGET();
        $form->loadData();

        if($form->isSubmitted()){
            $form->update();
            $form->js()->univ()->redirect('..')->execute();
        }
    }
}
