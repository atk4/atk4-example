<?php
/**
  * View_Archive demonstrates how you can create a re-usable widgets. It is defined
  * once but is used several times in the application
  */
class View_Archive extends AbstractView {

    /** 
      * This view uses 2 templates. Main one is $this->template, which is determined
      * by defaultTemplate() function. Other is extracted from the "List" tag of
      * default template and stored in $item_template
      */
    private $item_template=null;
    /**
      * This view perform a custom rendering. The more proper way is to handle heavy
      * data manipulation inside render() function and not init(). Here we get data
      * for 3 months and output them directly into parent's template using output()
      */
    function renderMonth($date){

        // We can re-use our main template several times
        $this->template->set('month',date('M',$date));

        // Clean contents of List tag, before we will be adding data into it
        $this->template->del('List');

        // get entries this month from database
        $data=$this->api->db->dsql()->table('blog_post')
            ->field('*')
            ->where('month(date)',date('m',$date))
            ->do_getAllHash();

        foreach($data as $row){
            // We need to customize data slightly by properly formatting URL
            $row['link']=$this->api->getDestinationURL('read',array('id'=>$row['id']));
            $this->item_template->set($row);

            // Our item template is appended into "List" tag
            $this->template->append('List',$this->item_template->render());
        }

        // Month entry ready, output it into parent's template
        $this->output($this->template->render());
    }
    function render(){
        $this->item_template=$this->template->cloneRegion('List');
        $this->renderMonth(time());
        $this->renderMonth(strtotime('-1 month'));
        $this->renderMonth(strtotime('-2 month'));
    }
    function defaultTemplate(){
        // This means, that region with tag < ?Archive? > will be used from
        // template page/index.html
        return array('page/index','Archive');
    }
}
