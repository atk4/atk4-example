<?php
class Model_BlogPost extends Model_Table {
    function init(){
        $this->addField('title');
        $this->addField('date')->type('date');
        $this->addField('body')->type('text');
    }
}
