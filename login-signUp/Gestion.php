<?php
 include 'user.php';

class Gestion{
   



    private $Connection = Null;

    private function getConnection(){
      
            $this->Connection = mysqli_connect('localhost', 'hicham', 'mlikihii','e-commerce');
           
         
       
        
        return $this->Connection;
        
    }
   
    
    
 function ajouterUtilisateur($Utilisateur){

    $email = $Utilisateur->getemail();
    $firstName = $Utilisateur->getNom();
    $passWord = $Utilisateur->getpassword();

    // requête SQL
    $insertRow="INSERT INTO `users`(firstName,`passWord`,email) 
                            VALUES('$firstName','$passWord','$email')";

    mysqli_query($this->getConnection(),$insertRow);
}


function Login( $password,$email){

    $rowLogin="SELECT * FROM `users` where email='$email'and `passWord`='$password' ";
     $query=mysqli_query($this->getConnection(),$rowLogin);
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
  
    $user = new Utilisateur();

    $TableData = array();
    foreach ($data as $value_Data) {
        
        // $user->setmatricule($value_Data['Matricule']);
        $user->setpassword ($value_Data['password']);
        $user->setemail($value_Data['email']);
        array_push($TableData, $user);


    }
    return $TableData;
}
function passwordOblie( $email,$firstName){

    $rowLogin="SELECT * FROM `users` where firstName='$firstName'and `email`='$email' ";
     $query=mysqli_query($this->getConnection(),$rowLogin);
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
  
    $user = new Utilisateur();

    $TableData = array();
    foreach ($data as $value_Data) {
        
        // $user->setmatricule($value_Data['Matricule']);
        $user->setpassword ($value_Data['passWord']);
        $user->setNom($value_Data['firstName']);
        $user->setemail($value_Data['email']);

        array_push($TableData, $user);


    }
    return $TableData;
}
}