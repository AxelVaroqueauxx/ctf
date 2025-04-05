<?php


try {
    $db = new PDO(dsn: 'mysql:host=localhost;dbname=php;charset=utf8',username:'root',password: '');
    $db -> setAttribute(attribute: PDO::ATTR_ERRMODE, value: PDO::ERRMODE_EXCEPTION);
    echo "connexion réussi mon doudou";
}   catch(Exception $e){
        die('Erreur :' . $e->getMessage());
    }
