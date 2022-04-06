<?php

include('gestion.php');
$gestion = new Gestion ;
$data=$gestion->afficher();







?>
<table>
<?php foreach($data as $value){?>
<tr>
    <td>  <?php echo  $value->getNom()  ?>  </td>
<td>  <?php echo  $value->getId()  ?>  </td>
<td>  <?php echo  $value->getPrix()  ;}?></td>

</tr>



</table>