
<!DOCTYPE html>
<html>
<style>
.button {
    display: inline-block;
    padding: 10px 20px;
    margin: 5px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
}
.button:hover {
    background-color: #45a049;
}
</style>
<div>
    <!-- Bouton pour la liste des comptes rendus -->
    <form action="liste_compte_rendu.php" method="post" style="display:inline;">
        <button type="submit">Liste des comptes rendus</button>
    </form>

    
    <?php 
    if ($_SESSION['numType']==1){
    echo '<form action="creer_compte_rendu.php" method="post" style="display:inline;">
        <button type="submit">Créer un compte rendu</button>
    </form>';}
    ?>

   
</div>

</html>