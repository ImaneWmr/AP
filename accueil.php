<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="accueil.css">
    <title>Accueil</title>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        include '_conf.php';

        if (isset($_POST['send_con'])) {
            $connexion = mysqli_connect($serveurBDD, $userBDD, $mdp, $nomBDD);
            $login = $_POST['login'];
            $_SESSION['login'] = $login;
            $motdepasse = $_POST['motDePasse'];
            $_SESSION['motDePasse'] = $motdepasse;
            $requete = "SELECT * FROM `utilisateur` WHERE login = '" . $_SESSION['login'] . "' AND motdepasse = '" . md5($_SESSION['motDePasse']) . "';";
            $resultat = mysqli_query($connexion, $requete);
            $trouve = 0;
            while ($donnees = mysqli_fetch_assoc($resultat)) {
                $trouve = 1;
                $_SESSION['id'] = $donnees['num'];
                $_SESSION['numType'] = $donnees['numType'];
                $_SESSION['login'] = $donnees['login'];
                $_SESSION['nom'] = $donnees['nom'];
                $_SESSION['prenom'] = $donnees['prenom'];
                $_SESSION['num'] = $donnees['num'];
            }
            if (!$trouve) {
                echo "<div class='message'>Login ou mot de passe incorrect.</div>";
            }
        }

        if (isset($_SESSION['id'])) {
            echo "<h1>Bienvenue " . htmlspecialchars($_SESSION['nom']) . " " . htmlspecialchars($_SESSION['prenom']) . "!</h1>";
            
            if ($_SESSION['numType'] == 1) {
                echo "<h2>Partie Élève</h2>";
            } else {
                echo "<h2>Partie Professeur</h2>";
            }

            echo "<a href='perso.php'>Informations personnelles</a>";

            echo "<form action='logout.php' method='post'>
                    <button type='submit'>Déconnexion</button>
                  </form>";
        } else {
            echo "<div class='message'>La connexion est perdue. Veuillez revenir à la <a href='index.php'>page d'accueil</a> pour vous reconnecter.</div>";
        }

        include 'menu.php';
        ?>
    </div>
</body>
</html>
