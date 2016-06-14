<?php
        try
            {
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=chimere;charset=utf8', 'root', 'root');
            }           
        catch (Exception $e)
            {
        die('Erreur : ' . $e->getMessage());
            }
        ?> 


  <?php 
    $idCommande=$_GET["idCommande"];
    $NewTpsPasse=$_POST["tpsPasse"];
    $NewCoutFinal=$_POST["coutFinal"];
    $NewEtape=$_POST["Etape"];
    
    $query = $pdo->exec("UPDATE commande SET tpsPasse='".$NewTpsPasse."', coutFinal='".$NewCoutFinal."', Etape='".$NewEtape."'
    WHERE idCommande='".$idCommande."'");
 
?>


<?php
 header('Location: Recapitulatif.php');
 exit();
?>