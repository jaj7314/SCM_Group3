<?php 
    use PayPal\Api\Payer;
	use PayPal\Api\Item;
	use PayPal\Api\ItemList;
	use PayPal\Api\Details;
	use PayPal\Api\Amount;
	use PayPal\Api\Transaction;
	use PayPal\Api\RedirectUrls;
	use PayPal\Api\Payment;
	require 'app/start.php';
    session_start();
    $_SESSION['price'] = 0;
    foreach ($_SESSION["cart_item"] as $item){
        $_SESSION['price'] += $item['price']*$item['quantity'];
    }

	
	
	$product = 'Crave Food Restaurant';
	$price = $_SESSION['price'];
	$shipping = 6;
	
	$total = $price + $shipping;
	
	$payer = new Payer();
	$payer->setPaymentMethod('paypal');

	$item = new Item();
	$item->setName($product)
		->setCurrency('MYR')
		->setQuantity(1)
		->setPrice($price);
		
	$itemList = new ItemList();
	$itemList->setItems([$item]);
	
	$details = new Details();
	$details->setShipping($shipping)
		->setSubtotal($price);
	
	$amount = new Amount();
	$amount->setCurrency('MYR')
		->setTotal($total)
		->setDetails($details);
		
	$transaction = new Transaction();
	$transaction->setAmount($amount)
		->setItemList($itemList)
		->setDescription('Pay For KF')
		->setInvoiceNumber(uniqid());
		
	$redirectUrls = new RedirectUrls();
	$redirectUrls->setReturnUrl(SITE_URL . 'pay.php?success=true')
		->setCancelUrl(SITE_URL . 'pay.php?success=false');
	
	$payment = new Payment();
	$payment->setIntent('sale')
		->setPayer($payer)
		->setRedirectUrls($redirectUrls)
		->setTransactions([$transaction]);
		
	try {
		$payment->create($paypal);
	} catch (Exception $e) {
		die($e);
	}
	
	$approvalUrl = $payment->getApprovalLink();
	unset($_SESSION['cart_item']);
	header("Location: $approvalUrl");
?>