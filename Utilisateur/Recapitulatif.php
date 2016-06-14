<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="cssRecapitulatif.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>
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
        <div class='accueil'>
            <a href="../Accueil/Accueil.php">Accueil ></a>
        </div> <img src="../Images/logo.png" class='logo' alt="logo" ><br><br>
    
        <table><tr><td colspan="3" class="titreTableau">Liste des bijoux en cours</td></tr>
            <tr><td class="test">DESCRIPTION</td><td class="test">ETAPE</td><td class="test"></td></tr>
        <?php
        $reqadherent = $pdo->query("SELECT Description, Etape FROM Commande;");
        while ($donnee = $reqadherent->fetch())
	{    
        ?>
        <tr>
        <td class="case"><?php echo $donnee['Description'];?></td>
        <td class="case"><?php echo $donnee['Etape'];?></td>  
        <td class="case"><a class="lien" href="Utilisateur.php?Description=<?php echo $donnee['Description'];?>">Accéder</a></td>

        </tr>
        <?php }
        
        ?>
       
 
        

    </body>
</html>
