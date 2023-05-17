<?php
    //core da aplicação
    require_once 'Core/Core.php';
    
    //conecão com o banco
    require_once 'lib/Database/Connection.php';

    // controllers
    require_once 'Controller/HomeController.php';
    require_once 'Controller/ErrorController.php';

    //model
    require_once 'Model/Citizen.php';

    //depedencia (Twig)
    require_once 'vendor/autoload.php';

    //iniciando o core da aplicação
    $core = new Core;
    $core->start($_GET);