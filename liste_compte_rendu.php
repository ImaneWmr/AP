<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comptes Rendus</title>
    <link rel="stylesheet" href="general.css"> 
</head>
<body>
   
    <div class="contenu">
    
        <h1>Gestion des Comptes Rendus</h1>
        <?php
        session_start();
        include '_conf.php';
        $connexion = mysqli_connect($serveurBDD, $userBDD, $mdp, $nomBDD);
        $numutilisateur=$_SESSION['num'];
        // Vérification des droits selon le type d'utilisateur
        if ($_SESSION['numType'] == 1) { 
            // Utilisateur élève
          
            $requete = "SELECT * FROM cr WHERE numEleve=" . $_SESSION['num'];
            $resultat = mysqli_query($connexion, $requete);

            if (mysqli_num_rows($resultat) > 0) {
                echo "<h2>Vos Comptes Rendus :</h2>";
                while ($donnees = mysqli_fetch_assoc($resultat)) {
                    
                   
                    echo "<h3>Compte Rendu :</h3>";
                 
              
                    echo "<p><strong>Date :</strong> " . htmlspecialchars($donnees['date']) . "</p>";
                    echo "<p><strong>Description :</strong> " . htmlspecialchars($donnees['description']) . "</p>";
                    echo "<a href='modifier_compte_rendu.php?num=" . $donnees['num'] . "' class='bouton'>Modifier</a>";
                    echo "<a href='commentaires.php?num=" . $donnees['num'] . "prof". $_SESSION['num'] ."' class='bouton'>Commentaires</a>";
            
                    echo "<hr>";
                   
                    
                }
            } else {
                echo "<p>Aucun compte rendu trouvé.</p>";
            }
        } 
        elseif($_SESSION['numType']==2){

        $connexion = mysqli_connect($serveurBDD, $userBDD, $mdp, $nomBDD);

        // Si un élève est sélectionné (via l'URL)
        if (isset($_GET['eleve'])) {
            $numEleve = intval($_GET['eleve']); // Sécuriser l'entrée
            $requete2 = "SELECT cr.num,cr.date, cr.description, cr.datecreation, cr.datemodification 
                         FROM cr 
                         WHERE cr.numEleve = $numEleve";
    
            $resultat2 = mysqli_query($connexion, $requete2);
    
            echo "<h2>Comptes Rendus de l'Élève</h2>";
           
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                
            if (mysqli_num_rows($resultat2) > 0) {
                echo "<br>";
                echo "<hr>";
                while ($cr = mysqli_fetch_assoc($resultat2)) {
                    echo "<div class='cr'>";
                    echo "<p><strong>Date :</strong> " . htmlspecialchars($cr['date']) . "</p>";
                    echo "<p><strong>Date de Création :</strong> " . htmlspecialchars($cr['datecreation']) . "</p>";
                    echo "<p><strong>Date de Modification :</strong> " . htmlspecialchars($cr['datemodification']) . "</p>";
                    echo "<p><strong>Description :</strong> " . htmlspecialchars($cr['description']) . "</p>";
                    echo "<a href='commentaires.php?num=" . $cr['num'] . "&prof=" . $numutilisateur . "' class='bouton'>Commentaires</a>";

                    echo "<hr>";
                    echo "</div>";
                }
            } else {
                echo "<p>Aucun compte rendu trouvé pour cet élève.</p>";
            }
    
            // Ajouter un bouton pour revenir à la liste des élèves
            echo "<a href='liste_compte_rendu.php'>Retour à la liste des élèves</a>";
        } 
        // Sinon, afficher la liste des élèves
        else {
            $requete1 = "SELECT num, nom, prenom FROM utilisateur WHERE numType = 1"; // Récupérer uniquement les élèves
            $resultat1 = mysqli_query($connexion, $requete1);
    
            echo "<h2>Liste des Élèves :</h2>";
    
            if (mysqli_num_rows($resultat1) > 0) {
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Nom et Prénom</th>";
                echo "<th>Action</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                
                // Boucle pour afficher les élèves
                while ($eleve = mysqli_fetch_assoc($resultat1)) {
                    echo "<tr>";
                    // Colonne avec le nom et prénom de l'élève
                    echo "<td><a href='liste_compte_rendu.php?eleve=" . htmlspecialchars($eleve['num']) . "'>";
                    echo htmlspecialchars($eleve['nom']) . " " . htmlspecialchars($eleve['prenom']);
                    echo "</a></td>";
                    
                    // Colonne avec le bouton de suppression
                    echo "<td>
                            <form action='supprimer.php' method='POST'>
                                <input type='hidden' name='numEleve' value='" . htmlspecialchars($eleve['num']) . "'>
                                <button type='submit' class='button-supprimer'>Supprimer</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
                
                // Ferme le tableau HTML
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<p>Aucun élève trouvé.</p>";
            }
        }
        }
        include 'menu.php';
    ?>
    </div>
    </body>
