<?php


 include 'produit-categorie.php';
class Gestion{

    private $Connection = Null;

    private function getConnection(){
      
            // $this->Connection = mysqli_connect('localhost', 'test', 'test123', 'demo');
            $this->Connection = mysqli_connect('localhost', 'hicham', 'mlikihii', 'e-commerce');
           
         
       
        
        return $this->Connection;
        
    }
    
 

    
    public function afficherCatigore(){
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
                   $produit->setNom_Categorie($value_Data["nom_categorie"]);   
                   array_push($TableData, $produit);
                   
                }
             
             
                   return $TableData;
    }

}
?>