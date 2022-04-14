<?php 

include "gestion.php";
$gestion = new Gestion();


$data = $gestion->getCartLine();





 foreach($data as $value){ 
    

  
   
  echo  '<br>' .$value->getProductCartQuantity() .'<br>';
  echo '<br>'. $value->getProduct();


   




//  $count  =  array_count_values($nameProduct);


  
  
  
  
// print_r(array_count_values($idProduct));

  
  


// print_r(array_count_values($array()));






 


 $chart_data .= "{ Produit:'". $value->getProduct()."',numbre:".$value->getProductCartQuantity()."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>


<!DOCTYPE html>
<html>
 <head>
  <title>chart with PHP & Mysql | lisenme.com </title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">

   <h3 align="center">Total d'ajouter un produit au  panier</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'Produit',
 ykeys:['numbre', ],
 labels:['numbre'],
 hideHover:'auto',
 stacked:true
});
</script>