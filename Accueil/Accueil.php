<!DOCTYPE html>
<html>
    <head>
        <title>Bienvenue  Chimères bijouterie</title>
        <link href="cssAccueil.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body>
        <img src="../Images/logo.png" class='logo' alt="logo" ><br>
        <div class='liste'><p class='titreListe'>Sertisseur</p>
                    <ul>
                        <li><a href="../Utilisateur/Recapitulatif.php">
                                    
            <?php   
            $pdo= new PDO('mysql:host=127.0.0.1;dbname=chimere;charset=utf8', 'root', 'root');
                     
            $req=$pdo->prepare("SELECT * FROM employé where Métier='Sertisseur';");
            $req->execute();

            while ($resultat = $req->fetch()) {
            $nom = $resultat["Nom"]." ".$resultat["Prénom"].'<br>';
            echo $nom;
            }
            ?>
                    
                                </a></li>
                            
                    </ul>
            </div>
        <div class='liste'><p class='titreListe'>Tailleur</p>
                    <ul>
                        <li><a href="../Utilisateur/Recapitulatif.php">
            <?php   
            $pdo= new PDO('mysql:host=127.0.0.1;dbname=chimere;charset=utf8', 'root', 'root');
                     
            $req=$pdo->prepare("SELECT * FROM employé where Métier='Tailleur';");
            $req->execute();

            while ($resultat = $req->fetch()) {
            $nom = $resultat["Nom"]." ".$resultat["Prénom"].'<br>';
            echo $nom;
            }
            ?>
                 
                            </a></li>
                        
                    </ul>     
            </div>
        <div class='liste'><p class='titreListe'>Polisseur</p>
                <ul>
                    <li><a href="../Utilisateur/Recapitulatif.php">
            <?php   
            $pdo= new PDO('mysql:host=127.0.0.1;dbname=chimere;charset=utf8', 'root', 'root');
                     
            $req=$pdo->prepare("SELECT * FROM employé where Métier='Polisseur';");
            $req->execute();

            while ($resultat = $req->fetch()) {
            $nom = $resultat["Nom"]." ".$resultat["Prénom"].'<br>';
            echo $nom;
            }
            ?>                        
                        
                        </a></li>
                    
                </ul> 
        </div>
        <div class='liste'><p class='titreListe'>Fondeur</p>
                <ul>
                    <li><a href="../Utilisateur/Recapitulatif.php">
            <?php   
            $pdo= new PDO('mysql:host=127.0.0.1;dbname=chimere;charset=utf8', 'root', 'root');
                     
            $req=$pdo->prepare("SELECT * FROM employé where Métier='Fondeur';");
            $req->execute();

            while ($resultat = $req->fetch()) {
            $nom = $resultat["Nom"]." ".$resultat["Prénom"].'<br>';
            echo $nom;
            }
            ?>                          
                        
                        </a></li>
             
                </ul> 
            </div>

        <div class='liste'><p class='titreListe'>Gérant</p>
                <ul>
                    <li><a href="../Gerant/AccueilGerant.php">
            <?php   
            $pdo= new PDO('mysql:host=127.0.0.1;dbname=chimere;charset=utf8', 'root', 'root');
                     
            $req=$pdo->prepare("SELECT * FROM employé where Métier='Vendeur';");
            $req->execute();

            while ($resultat = $req->fetch()) {
            $nom = $resultat["Nom"]." ".$resultat["Prénom"].'<br>';
            echo $nom;
            }
            ?>                        
                        </a></li>
                    
                </ul>         
        </div>
    </body>
</html>
