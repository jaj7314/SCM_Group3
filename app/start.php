<?php
	require 'vendor/autoload.php';
	
	define('SITE_URL','http://localhost/Mini%20Project/');
	
	$paypal = new \PayPal\Rest\ApiContext (
		new \PayPal\Auth\OAuthTokenCredential(
			'ASoA0dcEN0KXO0wOcuekJLeUhlIxr7W99m9PP0jw_dv3mBBV7V6auMV2Kzm2h1lKW5gwbtgPvuy0ld8p',
			'EP9JeSxcQUBBWZ9UKQQ-jL7fWyf6cuRSUYI5ZrvasrYQKIqYuIfYh3uhd5hYjTwocoYOHUqr-dAyPpM3'
		)
	)

?>