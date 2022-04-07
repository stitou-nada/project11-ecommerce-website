<?php
 include 'produit-categorie.php';
class Gestion{

    private $Connection = Null;

    private function getConnection(){
      
            $this->Connection = mysqli_connect('localhost', 'test', 'test123', 'demo');
            // $this->Connection = mysqli_connect('localhost', 'hicham', 'mlikihii', 'demo');
           
         
       
        
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
    //Afficher produit
    public function AjouterProduit($produit){
        
       $idProduit = $produit->getId_Produit () ;   
       $Prix = $produit->getPrix();   
       $Nom_produit =  $produit->getNom_Produit();   
       $Description = $produit->getDescription();   
       $Date_dexpiration = $produit->getDate_dexpiration();   
       $Categorie_produit = $produit->getCategorie_produit();   
       $Quantite_stock = $produit->getQuantite_stock();    
        // requête SQL
        $insertRow="INSERT INTO produit(`id_produit`, `nom_produit`, `prix`, `description`, `quantite_stock`, `date_d'expiration`, `categorie_produit`) 
                      VALUES('$idProduit', '$Nom_produit' ,'$Prix' , '$Description'  , '$Quantite_stock' ,'$Date_dexpiration' ,'$Categorie_produit')";

        mysqli_query($this->getConnection(), $insertRow);
    }

    //afficher categorie
    public function afficherCategorie(){

            $SelctRow = 'SELECT * FROM categorie';                 
                   $query = mysqli_query($this->getConnection() ,$SelctRow);
                   $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
                   $TableData = array();
                   foreach ( $produits_data as $value_Data) {
                    $produit = new Produit_Categorie();
                    $produit->setId_Categorie($value_Data['id_categorie']);
                    $produit->setNom_Categorie($value_Data["nom_categorie"]); 
                    array_push($TableData, $produit);
                }
                return $TableData;   
    }

    // afficher modification
    public function afficherProduit($id){
        $SelctRow = "SELECT * FROM produit                                                                                                            
        INNER JOIN categorie  ON produit.categorie_produit = categorie.id_categorie WHERE  produit.id_produit = '$id'  " ;
        $query = mysqli_query($this->getConnection() ,$SelctRow);
        $produits_data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $TableData = array();
        foreach ( $produits_data as $value_Data) {
                  
                   
                   $produit = new Produit_Categorie();
                   $produit->setId_Produit($value_Data['id_produit']); 
                   $produit->setNom_Produit($value_Data['nom_produit']);   
                   $produit->setPrix($value_Data['prix']);                      
                   $produit->setDescription($value_Data['description']);   
                   $produit->setDate_dexpiration($value_Data["date_d'expiration"]);   
                   $produit->setCategorie_produit($value_Data["categorie_produit"]);   
                   $produit->setQuantite_stock($value_Data["quantite_stock"]); 
                   $produit->setNom_Categorie($value_Data["nom_categorie"]);  
                   array_push($TableData, $produit);
                   
                }
                   return $TableData;
    }

    // modifier

    public function Modifier($id,$Nom_produit ,$Prix, $Description , $Quantite_stock ,$Date_dexpiration ){
        // Requête SQL
        $RowUpdate = "UPDATE produit SET 
        nom_produit='$Nom_produit',prix = '$Prix', `description`= '$Description',quantite_stock = '$Quantite_stock', `date_d'expiration` = '$Date_dexpiration' WHERE  id_produit = $id" ;

        mysqli_query($this->getConnection(),$RowUpdate);
    }
    // suprimmer
    public function Supprimer($id){
        $RowDelet = "DELETE FROM produit WHERE id_produit= '$id'";
        mysqli_query($this->getConnection(), $RowDelet);
    }

}