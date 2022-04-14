<?php



include "cartLine.php";
include "product.php";


class Gestion {

    public $name ;

    private $Connection = Null;

    private function getConnection(){
      
            // $this->Connection = mysqli_connect('localhost', 'test', 'test123', 'e-commerce');
            $this->Connection = mysqli_connect('localhost', 'hicham', 'mlikihii', 'e-commerce');
           
         
       
        
        return $this->Connection;
    }


    public function getCartLine(){
        $sql = "SELECT * ,SUM(productCartQuantity) FROM cart_line INNER JOIN produit on produit.id_produit=cart_line.idProduct GROUP BY  idProduct  ";
        // $sql = "SELECT * ,SUM(productCartQuantity) FROM cart_line  GROUP BY  idProduct ";
        $query = mysqli_query($this->getConnection(), $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        
       
        $cartLineList = array();
        foreach($result as $value){
            $product = new Product();
            $cartLine = new CartLine();
            $cartLine->setIdCartLine($value['idCartLine']);
            $cartLine->setIdCart($value['idCart']);
            $cartLine->setIdProduct($value['idProduct']);
            $cartLine->setProductCartQuantity($value['SUM(productCartQuantity)']);
            // $product->setId($value['id_produit']);
            $cartLine->setProduct($value['nom_produit']);
            // $product->setPrice($value['prix']);
            // $product->setDescription($value['description']);
            // $product->setDateOfExpiration($value["date_d'expiration"]);
            // $product->setQuantity($value['quantite_stock']);
            // $product->setCategory($value['categorie_produit']);
            

            
            array_push($cartLineList, $cartLine);
        }
        return $cartLineList;
    }
}
