<?php
class page_how extends Page {
    function init(){
        parent::init();


        $this->add('View_StackOverflow_Question');
    }
}
