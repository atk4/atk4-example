<?php
class View_StackOverflow_Question extends View {
    function init(){
        parent::init();


        $f=$this->add('Form');
        $f->addField('text','Question');
        $f->addSubmit('List answers');
    }
}
