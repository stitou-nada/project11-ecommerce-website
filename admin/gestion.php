<?php
 include 'produit.php';
class Gestion{

    private $Connection = Null;

    private function getConnection(){
      
            $this->Connection = mysqli_connect('localhost', 'hicham', 'mlikihii', 'demo');
           
         
       
        
        return $this->Connection;
        
    }
    
 

    
    public function afficher(){
        $SelctRow = 
        'SELECT produit.id,produit.Name,caregorie.id,caregorie.nom 
        FROM produit
        INNER JOIN caregorie ON produit.id = caregorie.id';
        $query = mysqli_query($this->getConnection() ,$SelctRow);
        $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

        $TableData = array();
        foreach ( $produits_data as $value_Data) {
                  
                   
                   $produit = new Produit();
                   $produit->setId($value_Data['nom']);   
                   array_push($TableData, $produit);
                }
             
             
                   return $TableData;
    }

    // public function afficher(){
    //     $SelctRow = 'SELECT *  FROM produit';
    //     $query = mysqli_query($this->getConnection() ,$SelctRow);
    //     $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);

    //     $TableData = array();
    //     foreach ($produits_data as $value_Data) {
    //         $produit = new Produit();
    //         $produit->setId($value_Data['id']);
    //         $produit->setNom($value_Data['Name']);
    //         $produit->setPrix($value_Data['prix']);
           
    //         array_push($TableData, $produit);
    //     }
    //       return $TableData;
 
    //     }
}