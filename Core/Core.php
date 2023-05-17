<?php

    class Core
    {
        public function start($urlGet)
        {
            //criando tabela no bd
            try {
                $table = Citizen::createTable();

                if(!$table){
                    echo "Erro ao iniciar o banco de dados";
                }

            } catch (Exception $e) {
                echo "erro".$e->getMessage();
            }

            //pegando o metodo
            if(isset($urlGet['method'])){
                $action = $urlGet['method'];
            }else{
                $action = 'index';
            }

            //pegando a controller
            if(isset($urlGet['page'])){
                $controller = ucfirst($urlGet['page'] . 'Controller');
            }else{
                $controller = 'HomeController';
            }

            if (!class_exists($controller)){
                $controller = 'ErrorController';
            }

            call_user_func_array(array(new $controller, $action), array($_POST));
        }
    }