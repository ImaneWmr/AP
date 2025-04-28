<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="general.css"> <!-- Lien vers le fichier CSS -->
</head>

    <!-- Menu horizontal -->
    <div class="menu">
        <?php 
        echo "<a href='accueil.php' class='button'>Retour</a>";

        if (isset($_SESSION['numType'])) {
            if ($_SESSION['numType'] == 1) {
                echo '
                <form action="creer_compte_rendu.php" method="post" class="menu-item">
                    <button type="submit" class="button">Créer un compte rendu</button>
                </form>
                <form action="liste_compte_rendu.php" method="post" class="menu-item">
                    <button type="submit" class="button">Liste des comptes rendus</button>
                </form>';
                echo "<form action='logout.php' method='post'  class='menu-item'>
                <button type='submit' class='button'>Déconnexion</button>
              </form>";
            } else {
                echo '
                <form action="liste_compte_rendu.php" method="post" class="menu-item">
                    <button type="submit" class="button">Liste des comptes rendus</button>
                </form>';
                echo "<form action='logout.php' method='post' class='menu-item' >
                <button type='submit' class='button'>Déconnexion</button>
              </form>";
            }
        } else {
            echo ""; // Aucune action si l'utilisateur n'est pas connecté
        }
        ?>
    </div>

   

</html>
