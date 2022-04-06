<?php
 include 'produit-categorie.php';
class Gestion{

    private $Connection = Null;

    private function getConnection(){
      
            $this->Connection = mysqli_connect('localhost', 'test', 'test123', 'demo');
           
         
       
        
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
                   $produit->setNom_Categorie($value_Data["nom_categorie"]);   
                   array_push($TableData, $produit);
                   
                }
             
             
                   return $TableData;
    }

    public function AjouterProduit($produit){
        
       $idProduit = $produit->getId_Produit () ;   
       $idPrix = $produit->getPrix();   
       $idNom_produit =  $produit->getNom_Produit();   
       $idDescription = $produit->getDescription();   
       $idDate_dexpiration = $produit->getDate_dexpiration();   
       $idCategorie_produit = $produit->getCategorie_produit();   
       $idQuantite_stock = $produit->getQuantite_stock();    
        // requête SQL
        $insertRow="INSERT INTO produit(`id_produit`, `nom_produit`, `prix`, `description`, `quantite_stock`, `date_d'expiration`, `categorie_produit`) 
                      VALUES('$idProduit', '$idNom_produit' ,'$idPrix' , '$idDescription'  , '$idQuantite_stock' ,'$idDate_dexpiration' ,'$idCategorie_produit')";

        mysqli_query($this->getConnection(), $insertRow);
    }
}