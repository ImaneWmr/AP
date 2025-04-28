<html>
<body>
    <br>
    <br>
    <br>
    <br>
    
    <h1>Modifications des informations personnelles</h1>
    <form action="#" method="post" name="perso">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
        
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>
        
        <label for="date_naissance">Date de naissance :</label>
        <input type="date" id="date_naissance" name="date_naissance" required>
        
        <label for="tel">Téléphone :</label>
        <input type="tel" id="tel" name="tel" pattern="[0-9]{10}" placeholder="Ex : 0612345678" required>
        
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" placeholder="Ex : exemple@mail.com" required>
        
        <button type="submit" name="send_new">Envoyer</button>
    </form>
</body>
</html>
<?php
 session_start();
 include 'fonctions.php';
// si c'est un éleve on insère le compte rendu
     if(isset($_POST['send_new'])){
    
        
        include '_conf.php';
        $connexion = mysqli_connect($serveurBDD, $userBDD, $mdp, $nomBDD);
        
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $date_naissance = htmlspecialchars($_POST['date_naissance']);
        $tel = htmlspecialchars($_POST['tel']);
        $email = htmlspecialchars($_POST['email']);
        
        $requete = "UPDATE `utilisateur` 
            SET 
                `email` = '$email',
                `nom` = '$nom',
                `prenom` = '$prenom',
                `daten` = '$date_naissance',
                `tel` = '$tel'
            WHERE `num` = '" . $_SESSION['num'] . "'";

        echo "données modifié !";
        $resultat = mysqli_query($connexion, $requete);
        
    }
    include 'menu.php';
     ?>