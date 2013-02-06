<?php
/** This file demonstrates all Visual Objects of Agile Toolkit */
class page_gallery extends Page {
    function page_index(){

        $tt=$this->add('Tabs');
        $i=$tt->addTab('Intro');

        $tt->addTabURL('./layout','Layout');
        $tt->addTabURL('./typography','Typography');
        $tt->addTabURL('./deflists','Definition Lists');
        $tt->addTabURL('./forms','Forms');



        $i->add('H1')->set('Welcome to View showcase');
        $i->add('P')->set('Most of the UI elements are available as Objects. Examine the source of the Gallery page to see how the User Interface is produced');
    }

    function page_layout(){
        $this->add('H1')->set('12-Grid System and Flexible layouts');

        $this->add('View_Info')->set('PHP Class "Column" is used for building layouts. The 12-Grid system is controlled by the page settings and may be either fixed or flexible. If you are using percentages, it is always going to be flexible, regardless of GS setting.');

        $c=$this->add('Columns');
        for($x=0;$x<12;$x++){
            $col=$c->addColumn(1);
            $col->set('span1');
            $col->addStyle('border','1px solid black');
        }

        $c=$this->add('Columns');
        for($x=0;$x<4;$x++){
            $col=$c->addColumn(3);
            $col->set('span3');
            $col->addStyle('border','1px solid black');
        }

        $c=$this->add('Columns');
        for($x=0;$x<4;$x++){
            $col=$c->addColumn();
            $col->set('auto');
            $col->addStyle('border','1px solid black');
        }

        $c=$this->add('Columns');
        $col=$c->addColumn('20%');
        $col->set('20%');
        $col->addStyle('border','1px solid black');

        $col=$c->addColumn('80%');
        $col->set('80%');
        $col->addStyle('border','1px solid black');
    }

    function page_typography(){
        $this->add('H1')->set('Typography');

        $this->add('View_Info')->set('Agile Toolkit adds a number of classes helping you to set headers and change how text flows. Natuarlly, you don\'t have to use them and may rely on templates too')->addClose()->addClass('atk-block');

        $cols=$this->add('Columns');
        $c=$cols->addColumn(2);
        $c->add('H1')->set('H1 Heading');
        $c->add('H2')->set('H2 Heading');
        $c->add('H3')->set('H3 Heading');
        $c->add('H4')->set('H4 Heading');
        $c->add('H5')->set('H5 Heading');

        $c=$cols->addColumn(5);
        $c->add('H2')->set('Heading')->sub('Subheading');
        $c->add('P')->set('Paragraph of text. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat');

        $c=$cols->addColumn(5);
        $cols=$c->add('Columns');

        $cc=$cols->addColumn(4);
        $cc->add('H2')->set('Basic List');
        $cc->add('CompleteLister')->setSource(array('item 1','item 2','item 3','item 4','item 5'))->addTotals();

        $cc=$cols->addColumn(4);
        $cc->add('H2')->set('.simple');
        $cc->add('CompleteLister')->addClass('simple')->setSource(array('item 1','item 2','item 3','item 4','item 5'))->addTotals();

        $cc=$cols->addColumn(4);
        $cc->add('H2')->set('<ol> list');
        $cc->add('CompleteLister')->setElement('ol')->setSource(array('item 1','item 2','item 3','item 4','item 5'))->addTotals();

    }

    function page_deflists(){
        $this->add('H1')->set('Definition Lists');

        $data=array(
            array('name'=>'Biology','descr'=>'The science of life or living matter in all its forms and phenomena, especially with reference to origin, growth, reproduction, structure, and behavior'),
            array('name'=>'Chemistry','descr'=>'The science that deals with the composition and properties of substances and various elementary forms of matter.'),

            array('name'=>'Geology','descr'=>'The science that deals with the dynamics and physical history of the earth, the rocks of which it is composed, and the physical, chemical, and biological changes that the earth has undergone or is undergoing.')
        );


        $cols=$this->add('Columns');
        $cc=$cols->addColumn(6);
        $cc->add('Lister',null,null,array('list/basic'))
            ->setSource($data);


        $cc=$cols->addColumn(6);
        $cc->add('Lister',null,null,array('list/basic'))
            ->setSource($data)
            ->addClass('stacked');
    }
    function page_forms(){
        $this->add('H1')->set('Forms');

        $cols=$this->add('Columns');
        $cc=$cols->addColumn(6);
        $f=$cc->add('Form');
        $f->addField('line','input');

        $field=$f->addField('line','input_with_button');
        $field->addButton('Button');
        $field->addComment('Field Comment');
        $field->setAttr('placeholder','placeholder');
        $field->validateNotNull();

        $f->addSubmit();

        if($f->isSubmitted()){
            $f->js()->univ()->successMessage('success')->execute();
        }

    }

}
