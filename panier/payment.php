<?php
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // URL de l'API Paypal de teste
$paypal_id='EQ7UGS7DEHSFL'; // Business email ID
$client="client";
$prix=90;
?>
<h4>Bien venu, <?php echo $client; ?></h4>

<div class="product">            
	<div class="image">
		<a href="http://www.oujood.com/" title="Cours et tutoriels  en ligne pour apprendre le développement Web" style="text-decoration: none;" rel="dofollow"><img src="http://www.oujood.com/images/logo.png" /></a>
	</div>
	<div class="name">
		PHP_OUJOOD Payement
	</div>
	<div class="price">
		Prix:<?php echo $prix; ?>
	</div>
	<div class="btn">
	<form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1">
	<input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="item_name" value="OUJOOD Payment">
	<input type="hidden" name="item_number" value="1">
	<input type="hidden" name="credits" value="510">
	<input type="hidden" name="userid" value="1">
	<input type="hidden" name="amount" value="<?php echo $prix; ?>">
	<input type="hidden" name="cpp_header_image" value="http://www.oujood.com/images/logo.png">
	<input type="hidden" name="no_shipping" value="1">
	<input type="hidden" name="currency_code" value="USD">
	<input type="hidden" name="handling" value="0">
	<input type="hidden" name="cancel_return" value="http://localhost/php-paypal/cancel.php">
	<input type="hidden" name="return" value="http://localhost/php-paypal/success.php?tx=83437E384950D&st=Completed&amt=90.00&cc=USD&cm=&item_number=1">
	<input type="image" src="https://www.sandbox.paypal.com/fr_FR/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - Le moyen le plus sûr et le plus simple de payer en ligne !">
	<img alt=" PayPal - The safer, easier way to pay online!" border="0" src="https://www.sandbox.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
	</form> 
	</div>
</div>
 