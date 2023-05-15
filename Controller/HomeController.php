<?php

    class HomeController
    {
        public function index()
        {
            try {
                $citizens = Citizen::getAll();
                
                $loader = new \Twig\Loader\FilesystemLoader('View');
                $twig = new \Twig\Environment($loader);

                $template = $twig->load('home.html');

                $parameters = array();
                $parameters['citizens'] = $citizens;

                $contents = $template->render($parameters);

                echo $contents;

            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }