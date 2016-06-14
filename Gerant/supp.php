<?php
        include_once '/Config.php';
        include_once '/GerantEmploye.php';
           
        $pdo= new PDO('mysql:host=127.0.0.1;dbname=chimere;charset=utf8', 'root', 'root');
        
        $nomEmploye=$_POST["nomEmploye"];

            $req=$pdo->prepare("DELETE FROM employé WHERE idEmployé=:nomEmploye");
            $req->bindParam(":nomEmploye", $nomEmploye);
            $req->execute();
            
        $pdo=null;
        
        
  