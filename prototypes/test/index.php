<?php 

include "gestion.php";
$gestion = new Gestion();


$data = $gestion->getCartLine();

print_r($data['getId()']);



// print_r ($value->getName());


    

?>  


<table>

<tr>
<td>name</td>
<td>id</td>
</tr>

<?php foreach($data as $value){ 
    // echo $value["id"];

    




    print_r ($value);
//   $nameProduct =  $value->getName();
//   $idProduct =  $value->getId();
// $array= array($value->getId());

    ?> 
<tr>
<td><?= $nameProduct ?></td>
<td>  <?= $idProduct ?></td>
</tr>



  
  
  <?php  

if($idProduct == "1"){

    

    echo $idProduct;
}



//  $count  =  array_count_values($nameProduct);


  
  
  
  
// print_r(array_count_values($idProduct));

  
  
  ?>

<?php  } ;

// print_r(array_count_values($array()));



?>
</table>