<?php

    class HomeController
    {
        public function index($parameters = null)
        {
            
            if($parameters['name']){

                $nis = str_pad(rand(0, 99999999999), 11, '0', STR_PAD_LEFT);
                try{
                    $create = Citizen::create($parameters['name'], $nis);
                    $msg = array('msg' => "Cidadão Cadastrado, NIS: " . $nis);
                }catch(Exception){
                    $mgs = array('msg' => "Erro no cadastro.");
                }

            }
            
            if($parameters['nis']){

                $citizen = Citizen::getCitizendByNis($parameters['nis']);

                if($citizen){
                    $msg = array('msg' => "Cidadão encontrado, " . $citizen['0']->name . ", NIS:" .$citizen['0']->nis);
                }else{
                    $mgs = array('msg' => "Cidadão não encontrado.");
                }
            }

            try {
                $loader = new \Twig\Loader\FilesystemLoader('View');
                $twig = new \Twig\Environment($loader);

                $template = $twig->load('home.html');
                if($msg){
                    $contents = $template->render($msg);

                }else{

                    $contents = $template->render();
                }

                echo $contents;

            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        public function create($parameters)
        {
            
            die('die');

            try{
                

            }catch(Exception $e){
                echo $e;
            }
        }
    }