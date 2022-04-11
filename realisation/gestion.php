<?php 
include "employe.php";

class gestion{

    private $Connection = Null;

    private function getConnection(){
      
            $this->Connection = mysqli_connect('localhost', 'hicham', 'mlikihii', 'demo');
           
         
       
        
        return $this->Connection;
        
    }


    function ajouterUtilisateur($Utilisateur){

        $matricule = $Utilisateur->getmatricule();
        $prenom = $Utilisateur->getPrenom();
        $nom = $Utilisateur->getNom();
        $password = $Utilisateur->getpassword();
   
        // requête SQL
        $insertRow="INSERT INTO user(Matricule,Nom, Prenom,`Password`) 
                                VALUES('$matricule','$nom','$prenom','$password')";

        mysqli_query($this->getConnection(),$insertRow);
    }


    function Login( $password,$Nom){

        $rowLogin="SELECT * FROM user where Nom='$Nom'and `Password`='$password' ";
         $query=mysqli_query($this->getConnection(),$rowLogin);
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        
      
        $user = new Employe();

        $TableData = array();
        foreach ($data as $value_Data) {
            
            // $user->setmatricule($value_Data['Matricule']);
            $user->setpassword ($value_Data['Password']);
            $user->setNom($value_Data['Nom']);
            array_push($TableData, $user);


        }
        return $TableData;
    }
    





}