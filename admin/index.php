<?php

include('gestion.php');
$gestion = new Gestion ;
$data=$gestion->afficher();

foreach($data as $value){

print_r($value->getId());

}