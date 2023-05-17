<?php

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

    // ob_start();
        // $core = new Core;
        // $core->start($_GET);

    //     $saida = ob_get_contents();
    // ob_end_clean();

    // echo $template;


// class Citizen {
//     private $name;
//     private $nis;

//     public function __construct($name, $nis) 
//     {
//         $this->name = $name;
//         $this->nis = $nis;
//     }

//     public function getName() 
//     {
//         return $this->name;
//     }

//     public function getNis() {
//         return $this->nis;
//     }

//     public function setName($name)
//     {
//         $this->name = $name;
//     }

//     public function store($name, $nis)
//     {
        
//     }

// }