<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="cssGerant.css" type="text/css" media="screen"/>	
        <title>Commande</title>
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
            <a href="AccueilGerant.php">Accueil ></a>
        </div> <img src="../Images/logo.png" class='logo' alt="logo" ><br>
        <div class='formulaire'>
        <form action='GerantCommande.php'
              method='post'>
        
            <ul><span class='titre'>Nouveau Bijou <br></span>
            <li><textarea name='Description' cols='50' rows='7' required="required" placeholder="Description :"></textarea></li>
            <li>Estimation <input  class="styleInput"  type='text' name='Estimation'></li>
            <li>Temps prévu<input  class="styleInput"  type='text' name='tpsPrévu'></li>
            <li>Temps passé<input  class="styleInput"  type='text' name='tpsPassé'></li>
            <li>Devis<input  class="styleInput"  type='text' name='Devis'></li>
            <li>Date arrivée<input  class="styleInput"  type='text' name='dateArrivee'></li>
            <li>Date fin<input  class="styleInput"  type='text' name='dateFin'></li>   
            <li>Coût Final<input  class="styleInput"  type='text' name='coutFinal'></li>
            <li class="inputCommande"><label for="Etape" >Etape</label>
                <select name="Etape" id="Etape">
                    <option value="Sertissage">Sertissage</option>
                    <option value="Fondage">Fondage</option>
                    <option value="Taillage">Taillage</option>
                    <option value="Polissage">Polissage</option>
                    <option value="Vente">Vente</option>
                </select>
                </li>
                <li class="inputCommande"><label for="Client" >Client</label>
                <select name="Nom" id="Etape">
                    <?php
                    
                     $pdo= new PDO('mysql:host=127.0.0.1;dbname=chimere;charset=utf8', 'root', 'root');
                   $reqClients = $pdo->prepare("SELECT * FROM client ");
                    $reqClients->execute();    
                        

                        while ($donnees = $reqClients->fetch()){ 
                            echo '<option value="'.$donnees['Nom'].'">'.$donnees['Nom'].'</option>';
                            //print_r($row); 
                        }
                    ?>
                </select>
                </li>
<!--            <li>Client <input  class="styleInput" type='text' name='Nom'>-->
            <input class="envoie" type='submit' value='Envoyer'></li>
        </form>    
        </div>
        <?php
        
         $pdo= new PDO('mysql:host=127.0.0.1;dbname=chimere;charset=utf8', 'root', 'root');
//        $reqClients = $pdo->prepare("SELECT * FROM client ");
//        $req2->execute();
        if (isset ($_POST["Description"])) {
        $Description = $_POST["Description"];
        }

        if (isset ($_POST["Estimation"])) {
        $Estimation = $_POST["Estimation"];
        }

        if (isset ($_POST["tpsPrevu"])) {
        $tpsPrevu = $_POST["tpsPrevu"];
        }
        
        if (isset ($_POST["tpsPasse"])) {
        $tpsPasse = $_POST["tpsPasse"];
        }
        
        if (isset ($_POST["Devis"])) {
        $Devis = $_POST["Devis"];
        }
        
        if (isset ($_POST["dateArrivee"])) {
        $dateArrivee = $_POST["dateArrivee"];
        }
        
        if (isset ($_POST["dateFin"])) {
        $dateFin = $_POST["dateFin"];
        }
        
        if (isset ($_POST["coutFinal"])) {
        $coutFinal = $_POST["coutFinal"];
        }
       
        if (isset ($_POST["Etape"])) {
        $Etape = $_POST["Etape"];
        }
        
        if (isset ($_POST["Nom"])) {
        $Nom = $_POST["Nom"];
        }
        
        
        $req=$pdo->prepare("INSERT into commande"
                ." (Description,Estimation, tpsPrevu, tpsPasse, Devis,  dateArrivee, dateFin, coutFinal, Etape, Client_idClient) values "
                ." (:Description,:Estimation,:tpsPrevu,:tpsPasse,:Devis,:dateArrivee,:dateFin,:coutFinal, :Etape, "
                ." (SELECT idClient FROM client WHERE Nom=:Nom));");

      
        $req->bindParam(':Description', $Description);
        $req->bindParam(':Estimation', $Estimation);       
        $req->bindParam(':tpsPrevu', $tpsPrevu);
        $req->bindParam(':tpsPasse', $tpsPasse);
        $req->bindParam(':Devis', $Devis);
        $req->bindParam(':dateArrivee', $dateArrivee);
        $req->bindParam(':dateFin', $dateFin);
        $req->bindParam(':coutFinal', $coutFinal);
        $req->bindParam(':Etape', $Etape);
        $req->bindParam(':Nom', $Nom);

        $req->execute();    

        $pdo=null;
        ?>

        
        <?php
        $pdo= new PDO('mysql:host=127.0.0.1;dbname=chimere;charset=utf8', 'root', 'root');
        $req=$pdo->prepare("SELECT * FROM commande;");
        $req->execute();         
 
        echo '<div class="scroll"><table><tr><td colspan="10" class="titreTableau">Liste des commandes</td></tr>'
                . '<tr class="test"><td>Description</td><td>Estimation</td><td>Temps Prévu</td>'
                . '<td>Temps Passé</td><td>Devis</td>'
                . '<td>Date Arrivée</td><td>Date Départ</td><td>Coût Final</td><td>Etape</td><td>Client</td></tr>';
        
        while ($donnees = $req->fetch()){ 
            echo '<tr>
        <td class="case">'.$donnees['Description'].'</td>
        <td class="case">'.$donnees['Estimation']." €".'</td>
        <td class="case">'.$donnees['tpsPrevu']." min".'</td>
        <td class="case">'.$donnees['tpsPasse']." min".'</td>
        <td class="case">'.$donnees['Devis']." €".'</td>
        <td class="case">'.$donnees['dateArrivee'].'</td>
        <td class="case">'.$donnees['dateFin'].'</td>
        <td class="case">'.$donnees['coutFinal']." €".'</td>
        <td class="case">'.$donnees['Etape'].'</td>';
        
            $idClient = $donnees['Client_idClient'];
           
            $req2 = $pdo->prepare("SELECT Nom FROM client where idClient=".$idClient.";");
            $req2->execute();
            
            $donnees2 = $req2->fetch();
       
        echo '<td class="case">'.$donnees2[0].'</td>
        </tr></div>';
          
        }
?>   
    </body>
</html>
