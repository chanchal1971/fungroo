<?php
require ('connect.php');

if (isset($_POST['email'])) {

	$email_id = $_POST['email'];

	$result = mysql_query("SELECT * FROM `subscribe` WHERE email_id='".$email_id."'");
	$count = mysql_num_rows($result);
	$res = false;
	if ($count <= 0)
	{
// your code INSERT
		$res = mysql_query("INSERT INTO `subscribe` VALUES ('".$email_id."')");
	}

	if($res){
		include '../sendgrid-php-master/SendGrid_loader.php';

		$sendgrid = new SendGrid('database_name', 'password');

		$html = 'Hi,<br> 
		Thankyou for subscribing with us.
		<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;margin: 0;padding: 0;height: 100% !important;width: 100% !important;">
		<tbody><tr>
		.
		.
		.
		.
		</tbody>
		<br>
		<br>
		Regards,<br>
		Fungroo Team.
		';

		$mailTo = array($email_id,'chanchal.santra@gmail.com');
		$mail = new SendGrid\Mail();
		$mail->setTos($mailTo)->
		setFrom('noreply@xxxx.com')->
		setFromName('Website_name')->
		setSubject('Registration for free trial')->
		setHtml($html);

		$mailResult=$sendgrid->web->send($mail);
		$arr=json_decode($mailResult,true);

		if($arr['message']=='success')
			echo "Your Email: $email_id has been submit !!";
		else
			echo "Problem occured, Please try again later.";
	}  
	else
	{
		echo "You have already subscribed";
	}
}

?>
