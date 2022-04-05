<?php
 include 'produit-categorie.php';
class Gestion{

    private $Connection = Null;

    private function getConnection(){
      
            $this->Connection = mysqli_connect('localhost', 'hicham', 'mlikihii', 'demo');
           
         
       
        
        return $this->Connection;
        
    }
    
 

    
    public function afficher(){
        $SelctRow = 'SELECT * FROM produit
         INNER JOIN categorie ON produit.categorie_produit = categorie.id_categorie';
        $query = mysqli_query($this->getConnection() ,$SelctRow);
        $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $TableData = array();
        foreach ( $produits_data as $value_Data) {
                  
                   
                   $produit = new Produit_Categorie();
                   $produit->setId_Produit($value_Data['id_produit']);   
                   $produit->setPrix($value_Data['prix']);   
                   $produit->setNom_Produit($value_Data['nom_produit']);   
                   $produit->setDescription($value_Data['description']);   
                   $produit->setDate_dexpiration($value_Data["date_d'expiration"]);   
                   $produit->setCategorie_produit($value_Data["categorie_produit"]);   
                   $produit->setQuantite_stock($value_Data["quantite_stock"]);   
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