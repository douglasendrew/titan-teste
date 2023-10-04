<?php
namespace Init;

use Init\Route;

class SystemInit {
    /**
     * Método responsável por iniciar o sistema
     * @param string $route
     * @param string $request_type
     * @throws \Exception
     */
    public static function run(
        string $route = "",
        string $request_type = "GET"
    ) 
    { 
        $routing = new Route();
        if(strpos($route,"?") !== false) {
            $route = explode("?", $route)[0];
        }

        if($route == "/") {
            $route = "/Home";
        }

        try {
            return $routing->view($route, $_REQUEST, $request_type);
        } catch ( \Exception ) {
            return $routing->view('/Errors/500');        
        }
    }
}