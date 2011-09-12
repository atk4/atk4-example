<?php
class Model_BlogPost extends Model_Table {
    public $entity_code='blog_post';
    function init(){
        parent::init();
        $this->addField('title');
        $this->addField('date')->type('date')->defaultValue(date('Ymd'));
        $this->addField('body')->type('text');
    }
}
