<?php 

namespace Titan\Sistema\Controllers;

use Init\Route;

class HomeController {
    public function execute( $data ) {
        $routing = new Route();
        $routing->render("/Home");
    }
}