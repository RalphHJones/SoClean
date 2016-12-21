<?php

namespace Website\AdminBundle\Controller;

class Controller extends \Website\CommonBundle\Controller\Controller {

    public $scope = 'admin';

    public function adminInit() {
        $route = $this->container->get('request_stack')->getMasterRequest()->get('_route');

        $this->addTitle('Administration');
    }
 

    

}
