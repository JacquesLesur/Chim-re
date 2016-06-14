<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">       
        <link rel="stylesheet" href="cssUtilisateur.css" type="text/css" media="screen"/>	
        <title>Etape</title>
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
        <?php
        
       
        $query=$pdo->prepare('SELECT * FROM commande WHERE Description = :Description;');
                $query->bindValue(':Description',$_GET['Description'], PDO::PARAM_STR);
		$query->execute();
		$data=$query->fetch();
		
		$idCommande=$data['idCommande'];
		$Description=$data['Description'];
                $tpsPasse=$data['tpsPasse'];
		$Estimation=$data['Estimation'];
		$coutFinal=$data['coutFinal'];
		$Etape=$data['Etape'];
		$query->CloseCursor();
                
          ?>
         <div class='accueil'>
         <a href="Recapitulatif.php">Accueil ></a>
         </div> <img src="../Images/logo.png" class='logo' alt="logo" ><br><br>
         <form method="post" action="Modification.php?idCommande=<?php echo $idCommande; ?>">
        <div class="tableau">
        <table>
            <tr class="header">
                <td class="desc" colspan="2">Description <?php echo $Description ?></td>
                <td>Etape en cours <?php echo $Etape ?></td>
            </tr>
            
            <tr class="form">
                <td>Estimation <?php echo $Estimation ?></td>
                <td>Temps passé<input  class="styleInput"  type='text' name='tpsPasse'></td>
                <td>Coût <input  class="styleInput"  type='text' name='coutFinal'></td>
            </tr>
            <tr class="form">
                <td colspan="3">Prochaine Etape :
                <label for="Etape">Etape</label>
                <select name="Etape" id="Etape">
                    <option value="Sertissage">Sertissage</option>
                    <option value="Fondage">Fondage</option>
                    <option value="Taillage">Taillage</option>
                    <option value="Polissage">Polissage</option>
                    <option value="Vente">Vente</option>
                </select>
                <input class="envoie"  type='submit' value='Valider'></td>
            </tr>   
        </table>
        </div><br> 
        </form>
    </body>
</html>
