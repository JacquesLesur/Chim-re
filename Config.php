<?php

class Config {

    //on stocke les constantes
    const SERVERNAME = "127.0.0.1";
    const DBNAME ="chimere";
    const USER ="root";
  
        public function enregistrer(){
        $pdo = new PDO("mysql:host=" . config::SERVERNAME
            .";dbname=".config::DNAME
            ,config ::USER);
        }
}
