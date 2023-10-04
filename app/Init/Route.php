<?php

namespace Init;

class Route {
    /**
     * Faz carrega a view solicitada pelo usuário
     * @param string $name
     * @param array $data
     */
    public function view(
        string $path,
        array  $data = [],
        string $request_type = "GET"
    ) {
        require 'routes/routes.php';

        if( file_exists(__DIR__ . "/../Resources/Views$path.php") || $request_type == "POST" ) {
            // Caso a request for POST, interagir com a Controller responsável
            if( !empty($routes[$path]) ) { 
                $path_config = $routes[$path];

                if(!isset($path_config['type'])) {
                    return $this->returnError(404);
                }

                if(!in_array($request_type, $path_config['type'])) {
                    return $this->returnError(500);
                }

                if(isset($path_config['function']) and is_array($path_config['function']) and !empty(isset($path_config['function']))) {
                    $class = $path_config['function'][0];

                    if(isset($path_config['function'][1])) {
                        $method = $path_config['function'][1];
                    } else {
                        // Seta o método padrão para 'execute'
                        $method = 'execute';
                    }


                    // Verifica se a classe inserida nas rotas existe
                    if (class_exists($class) and method_exists($class, $method)) {
                        $obj = new $class();
                        return $obj->$method($data); 
                    } else {
                        return $this->returnError(500);
                    }
                } else {
                    return $this->render($path, $data);
                }
            }
        } 

        if( !empty($routes[$path]) ) { 
            $path_config = $routes[$path];

            if(!isset($path_config['type'])) {
                return $this->returnError(404);
            }

            if(!in_array($request_type, $path_config['type'])) {
                return $this->returnError(500);
            }

            if(isset($path_config['function']) and is_array($path_config['function']) and !empty(isset($path_config['function']))) {
                $class = $path_config['function'][0];

                if(isset($path_config['function'][1])) {
                    $method = $path_config['function'][1];
                } else {
                    // Seta o método padrão para 'execute'
                    $method = 'execute';
                }


                // Verifica se a classe inserida nas rotas existe
                if (class_exists($class) and method_exists($class, $method)) {
                    $obj = new $class();
                    return $obj->$method($data); 
                } else {
                    return $this->returnError(500);
                }
            } else {
                return $this->render($path, $data);
            }
        }

        return $this->returnError(404);
    }


    /**
     * Seta a view para o erro solicitado e a response tambem
     * @param int $error_code
     */
    public function returnError(
        int $error_code
    ) {
        http_response_code($error_code);

        require __DIR__ . "/../Resources/Assets/template/header.php";
        require __DIR__ . "/../Resources/Views/Errors/$error_code.php";
        require __DIR__ . "/../Resources/Assets/template/footer.php";
        return false;
    }


    /**
     * Renderiza uma view 
     * @param string $view_name
     */
    public function render(
        string $view_name,
        array $data = [],
        mixed $db_data = ""
    ) {
        if(!empty($data)) {
            foreach ( $data as $key => $value ) { 
                $$key = $value;
            }
        }

        require __DIR__ . "/../Resources/Assets/template/header.php";
        require __DIR__ . "/../Resources/Views/$view_name.php";
        require __DIR__ . "/../Resources/Assets/template/footer.php";
        return false;
    }


    /**
     * Redireciona para uma rota 
     * @param string $route
     */
    public function redirect(
        string $route
    ) {
        echo "<script>window.location.href = '$route'</script>";
    }
}
