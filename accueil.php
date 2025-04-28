//<link rel="stylesheet" href="general.css"> 
    <?php
        session_start();
        include '_conf.php';
       
        if (isset($_POST['send_con'])) {
            
            $connexion = mysqli_connect($serveurBDD, $userBDD, $mdp, $nomBDD);
            $login = $_POST['login'];
            $motdepasse = $_POST['motDePasse'];
            $requete = "SELECT * FROM `utilisateur` WHERE login = '" . $login . "' AND motdepasse = '" . md5($motdepasse) . "';";
            //echo $requete;
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
            echo "<br>";
            echo "<br>";
            
           

            echo "<h1 class='bienvenu'>Bienvenue " . htmlspecialchars($_SESSION['nom']) . " " . htmlspecialchars($_SESSION['prenom']) . "!</h1>";
            echo "<br>";
            if ($_SESSION['numType'] == 1) {
              
                
                echo " <h2>Partie Élève </h2> ";
            } else {
                echo " <h2>Partie Professeur </h2> ";
            }
             echo " <br>";

            echo "<a href='perso.php'>Informations personnelles</a>";
        } else {
            echo "<div class='message'>La connexion est perdue. Veuillez revenir à la <a href='index.php'>page d'accueil</a> pour vous reconnecter.</div>";
        }
        
        include 'menu.php';
        ?>
 
