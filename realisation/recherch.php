
<form action="" method="POST">

<input type="password" name="Password">
<input type="text" name="Nom">
<button type="submit"></button>
</form>
<?php

    include "gestion.php";
    if(!empty($_POST)){


        $Utilisateur= new Employe;
        $gestion = new Gestion();
        // $Utilisateur->setmatricule($_POST['Matricule']);
        $Utilisateur->setNom($_POST['Nom']);
        // $Utilisateur->setPrenom($_POST['Prenom']);
        $Utilisateur->setpassword($_POST['Password']);
        



        $gestion->ajouterUtilisateur($Utilisateur);
    }

    
    ?>
