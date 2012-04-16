<?php

/**
  * This page demonstrates UI implementation without reliance on Models. 
  *
  */
class page_admin extends Page {
    function init(){
        parent::init();

        $this->add('View_Error')->set('Starting with Agile Toolkit 4.2, Models are the core component of the toolkit. While you can still use database requests directly, it so much easier to use models. Look into the other example of a "blog" which makes use of models');

    }
    // page_index(){
}
