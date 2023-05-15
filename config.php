<?php
    $db_host = 'localhost';
    $db_user_name = 'root';
    $db_password = 'dentes';
    $db_name = 'gesuas';

    $connection = new mysqli($db_host, $db_user_name, $db_password, $db_name);

    if($connection->connect_errno){
        echo "Erro";
    }else{
        'n erros';
    }