<?php 
    require_once(ROOT . './libs/rb-mysql.php');

    try {
        R::setup( 
            'mysql:host='. DB_HOST .';dbname=' . DB_NAME,
             DB_USER, 
             DB_PASS 
            );
    
            if(!R::testConnection()) {
                throw new Exception('Нет соединения с базой данных');
            }

    } catch (Exception $e) {
        die("Ошибка подключения к базе данных: " . $e->getMessage());
    }




   
?>