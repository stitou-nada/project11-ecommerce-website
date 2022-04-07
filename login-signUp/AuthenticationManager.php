<?php
 include 'User.php';

class AuthenticationManager{
   



    private $Connection = Null;

    private function getConnection(){
      
        $this->Connection = mysqli_connect('localhost', 'hicham', 'mlikihii','e-commerce'); 
        return $this->Connection;
        
    }
   
    
    
 function registerUser($user){

    // Prepare an insert statement
    $sql = "INSERT INTO users (firstName, lastName, passWord, email, role) VALUES (?, ?, ?, ?, ?)";
         
    if($stmt = $this->getConnection()->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sssss", $param_firstname, $param_lastname, $param_password, $param_email, $param_role);
        
        // Set parameters
        $param_firstname = $user->getFirstname();
        $param_lastname = $user->getLastname();
        $param_password = password_hash($user->getPassword(), PASSWORD_DEFAULT); // Creates a password hash
        $param_email = $user->getEmail();
        $param_role = $user->getRole();
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Redirect to login page
            header("location: login.php");
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();

        
    }
     // Close connection
     $this->getConnection()->close();
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
// function Login( $password,$email){

//     $rowLogin="SELECT * FROM `users` where email='$email'and `passWord`='$password' ";
//      $query=mysqli_query($this->getConnection(),$rowLogin);
//     $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
  
//     $user = new Utilisateur();

//     $TableData = array();
//     foreach ($data as $value_Data) {
        
//         // $user->setmatricule($value_Data['Matricule']);
//         $user->setpassword ($value_Data['password']);
//         $user->setemail($value_Data['email']);
//         array_push($TableData, $user);


//     }
//     return $TableData;
// }
// function passwordOblie( $email,$firstName){

//     $rowLogin="SELECT * FROM `users` where firstName='$firstName'and `email`='$email' ";
//      $query=mysqli_query($this->getConnection(),$rowLogin);
//     $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    
  
//     $user = new Utilisateur();

//     $TableData = array();
//     foreach ($data as $value_Data) {
        
//         // $user->setmatricule($value_Data['Matricule']);
//         $user->setpassword ($value_Data['passWord']);
//         $user->setNom($value_Data['firstName']);
//         $user->setemail($value_Data['email']);

//         array_push($TableData, $user);


//     }
//     return $TableData;
// }
}