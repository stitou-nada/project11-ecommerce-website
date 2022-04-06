<?php
 include 'user.php';

class Gestion{
   



    private $Connection = Null;

    private function getConnection(){
      
            $this->Connection = mysqli_connect('localhost', 'hicham', 'mlikihii','e-commerce');
           
         
       
        
        return $this->Connection;
        
    }
   
    
    
 function registerUser($user){

    $email = $user->getemail();
    $firstName = $user->getNom();
    $passWord = $user->getpassword();

    // requête SQL
    $insertRow="INSERT INTO `users`(firstName,`passWord`,email) 
                            VALUES('$firstName','$passWord','$email')";

    mysqli_query($this->getConnection(),$insertRow);
}



// Validate email
function validEmail($email){
     // Prepare a select statement
     $sql = "SELECT id FROM users WHERE email = ?";
        
     if($stmt = mysqli_prepare($this->getConnection(), $sql)){
         // Bind variables to the prepared statement as parameters
         mysqli_stmt_bind_param($stmt, "s", $param_email);
         
         // Set parameters
         $param_email = $email;
         
         // Attempt to execute the prepared statement
         if(mysqli_stmt_execute($stmt)){
             /* store result */
             mysqli_stmt_store_result($stmt);
             return mysqli_stmt_num_rows($stmt);
             mysqli_stmt_close($stmt);
        }
    }
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