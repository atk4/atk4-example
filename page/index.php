<?php
class page_index extends Page {
    function init(){
        parent::init();
        $p=$this;


        $p->add('Button',null,'SampleButton')->js('click')->univ()->alert('JavaScript / jQuery / Univ Works!');

    }

    function defaultTemplate(){
        return array('page/index');
    }
}
