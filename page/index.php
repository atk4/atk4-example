<?php
class page_index extends Page {
    function init(){
        parent::init();
        $p=$this;


        // Paste some code here for quick-start

        $p->add('Button')
            ->js('click')->univ()
            ->alert('JavaScript / jQuery / Univ Works!');




    }

    function defaultTemplate(){
        return array('page/index');
    }
}
