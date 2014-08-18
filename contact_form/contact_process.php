<?php
require ('connect.php');

if (isset($_POST['email'])) {

	$email_id = $_POST['email'];

		$name = ($_POST['name']);
		$subject = $_POST['subject'];
		$email = $_POST['email'];
		$message = $_POST['message'];

		include '../../sendgrid-php-master/SendGrid_loader.php';

		$sendgrid = new SendGrid('database_name', 'password');

		

		$mailTo = array('xxx@xxx.com');
		$mail = new SendGrid\Mail();
		$mail->setTos($mailTo)->
		setFrom($email)->
		setFromName($name)->
		setSubject($subject)->
		setHtml($message);

		$mailResult=$sendgrid->web->send($mail);
		$arr=json_decode($mailResult,true);

		if($arr['message']=='success')
			echo "OK";
		else
			echo "Problem occured, Please try again later.";
	}  
	else
	{
		echo "Thank you for again message us.";
	}


?>
