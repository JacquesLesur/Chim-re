<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="cssGerant.css" type="text/css" media="screen"/>	
        <title>Client</title>
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
        <form action='GerantClient.php'
              method='post'>
                  
            <ul><span class='titre'>Clients</span>
                <li class="new">Nouveau Client : </li>
                <li>Nom<input class="styleInput" type='text' name='nom' required="required"></li>
                <li>Prénom<input  class="styleInput"  type='text' name='prenom' required="required"></li>
                <li>numTéléphone<input  class="styleInput"  type='text' name='numtelephone' required="required">
            
                <input class="envoie" type='submit' value='Envoyer'></li>
            </ul>
        
        
        </form>
        </div>
            <?php 
            include_once '/Config.php';
           
            
            
        $pdo= new PDO('mysql:host=127.0.0.1;dbname=chimere;charset=utf8', 'root', 'root');
        
       
            
        if (isset ($_POST["nom"])) {
        $nom = $_POST["nom"];
        }

        if (isset ($_POST["prenom"])) { 
        $prenom = $_POST["prenom"];
        }

        if (isset ($_POST["numtelephone"])) {
        $numtelephone = $_POST["numtelephone"];
        }

       
        
        $req=$pdo->prepare("INSERT into client"
                ." (Nom,Prénom,numTéléphone) values "
                ." (:nom,:prenom,:numtelephone);");
        
        
     
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':numtelephone', $numtelephone);
        
        $req->execute();    

        $pdo=null;
    
 
        ?> 
        
                <?php
                    $pdo= new PDO('mysql:host=127.0.0.1;dbname=chimere;charset=utf8', 'root', 'root');
                    $req=$pdo->prepare("SELECT * FROM client;");
                    $req->execute();         

                    echo '<div class="scroll"><table><tr><td colspan="3" class="titreTableau">Liste des clients</td></tr>'
                    . '<tr><td class="test">NOM</td><td class="test">PRENOM</td><td class="test">N° TELEPHONE</td></tr>';

                    while ($donnees = $req->fetch()){
                    echo '<tr>
                    <td class="case">'.$donnees['Nom'].'</td>
                    <td class="case">'.$donnees['Prénom'].'</td>
                    <td class="case">'.$donnees['numTéléphone'].'</td>
                    </tr></div>';
            }
?> 

    </body>
</html>
