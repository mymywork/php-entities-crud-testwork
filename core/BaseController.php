<?php
class BaseController {

    function __construct($view) {
        //print "Constructor\n";
        $this->view = $view;
    }

}