<?php
include 'Gestion.php';
if (!empty($_POST)){
$email = $_POST['email'];
$password = $_POST['password'];

    $gestion = new Gestion(); 

   if($data= $gestion->Login( $password,$email)){

    header("Location: page.php");
  
}
}
else{
    $message ;
}


?>

<a href="signup.php">sign</a>
<a href="mots de passe oublie.php">mots de passe oublié</a>
<form action=""method='POST'>

 email    <input type="text" name="email">
   Password <input type="Password" name="password">
    <button type="submit"> login</button>
    
    <?php if(isset($_POST['email'])){
     echo $message = "Mauvais Nom ou mot de passe , réessayez"; 
  } ?></p>
</form>