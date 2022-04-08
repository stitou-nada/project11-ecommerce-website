<?php
session_start();
include 'cartManager.php';
$cartManager = new CartManager();




if(isset($_POST['id'])){

    $id=$_POST['id'];
    $cartLine = new CartLine();
    $cart = new Cart();
    $cartLineList = [];
    $quantity =  $_POST["quantite"];

    $cart = $cartManager->getCart($_COOKIE['cartCookie']);

    $product = $cartManager->afficherProduit($id);
    
    $cartLine->setIdCart($cart->getId());

    $cartManager->addProduct($cart, $product, $quantity);
   
    // $cartManager->set($_POST["id"], $valeurs);


    header("location: panier.php");

}
