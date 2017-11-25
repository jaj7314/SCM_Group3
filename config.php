<?php
$ENV = "MOBILEAPP";
if($ENV == "SCM"){
  $HOST = 'ec2-54-221-207-143.compute-1.amazonaws.com';
  $PORT = '5432';
  $DATABASE_NAME = 'd1583ojbjir9jc';
  $DATABASE_USER = 'olrmqdczslmujh';
  $DATABASE_PASSWORD = '63f0cb1a16cf6b40b5b1a71e3fb7f61f0bbf8484ef36c73a3c9d668ef4d76b66';
  
}else if ($ENV == "MOBILEAPP"){

	$HOST = 'ec2-107-22-171-11.compute-1.amazonaws.com';
  $PORT = '5432';
  $DATABASE_NAME = 'dat56gurdqn6e2';
  $DATABASE_USER = 'cjhvexndfmiwua';
  $DATABASER_PASSWORD = '18dd6aa2772bd12b7241fff184beead8d5e30f9bb79356931fb4a2e6db88f6c1';
  
}

?>
