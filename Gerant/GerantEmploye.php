<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">       
        <link rel="stylesheet" href="cssGerant.css" type="text/css" media="screen"/>	
        <title>Employe</title>
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
        <form action='GerantEmploye.php'
              method='post'>
                  

            <ul><span class='titre'>Employe</span>
                <li class="new">Nouvel employé :</li>
                <li>Nom<input  class="styleInput"  type='text' name='nom' required="required"></li>
                <li>Prénom<input  class="styleInput"  type='text' name='prenom' required="required"></li>
            
            <li class="inputCommande"><label for="Metier" >Metier</label>
                <select name="metier" id="Etape">
                    <option value="Sertisseur">Sertisseur</option>
                    <option value="Tailleur">Tailleur</option>
                    <option value="Polisseur">Polisseur</option>
                    <option value="Fondeur">Fondeur</option>
                    <option value="Vendeur">Vendeur</option>
                </select>
                <input class="envoie"  type='submit' value='Envoyer'></li>
            
        </form>
        
        </div>
        <?php
        
        $pdo= new PDO('mysql:host=127.0.0.1;dbname=chimere;charset=utf8', 'root', 'root');
        
       
            
        if (isset ($_POST["nom"])) {
        $nom = $_POST["nom"];
        }

        if (isset ($_POST["prenom"])) {
        $prenom = $_POST["prenom"];
        }

        if (isset ($_POST["metier"])) {
        $metier = $_POST["metier"];
        }

       
        
        $req=$pdo->prepare("INSERT into employé"
                ." (Nom,Prénom,Métier) values "
                ." (:nom,:prenom,:metier);");
        
        
     
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':metier', $metier);
        
        $req->execute();    
        
             

        $pdo=null;
               
        ?>
        <br>

   <?php
        $pdo= new PDO('mysql:host=127.0.0.1;dbname=chimere;charset=utf8', 'root', 'root');
        $req=$pdo->prepare("SELECT * FROM employé ORDER BY Métier;");
        $req->execute();         
 
        
        echo '<div class="scroll"><form action="supp.php" method="post"><table><tr><td colspan="3" class="titreTableau">Liste des employés</td></tr>'
                    . '<tr><td class="test">NOM</td><td class="test">PRENOM</td><td class="test">METIER</td></tr>';
        while ($donnees = $req->fetch()){
        echo '<tr>
        <td class="case">'.$donnees['Nom'].'</td>
        <td class="case">'.$donnees['Prénom'].'</td>
        <td class="case">'.$donnees['Métier'].'</td>
        </tr>';
}
?>
        
        <!-- Partie suppression -->
        
     <?php
        $pdo= new PDO('mysql:host=127.0.0.1;dbname=chimere;charset=utf8', 'root', 'root');
    $req=$pdo->prepare("SELECT * FROM employé;");
    $req->execute();         
 ?>
<form method='post' action='supp.php'>
        
            <label>Nom de l'employé</label>
 <?php        
$req=$pdo->prepare(" SELECT * FROM employé ORDER BY Nom");
$req->execute();
?> 
            <select name='nomEmploye'>
            
<?php
while ($ligne=$req->fetch(PDO::FETCH_ASSOC))
{ { 
echo '<option value='.$ligne['idEmployé'].'>'.$ligne['Nom'].'</option>'; 
} 
}
        ?>
            </select>
            <input type='submit' value='Supprimer'>
        </form>   
    </body>
</html>
