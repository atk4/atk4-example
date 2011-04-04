<?php
class page_authtest extends Page {
    function init(){
        parent::init();

        // If you want to use whitelist-based auth check, call check() from Frontend.php, init() method
        $this->api->auth->check();

        $this->add('HtmlElement')
            ->setElement('P')
            ->set('Successfully authenticated');

        $this->add('Button')->set('Logout')
            ->js('click')->univ()->location($this->api->getDestinationURL('logout'));
    }
}
