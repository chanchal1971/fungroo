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

		$sendgrid = new SendGrid('fungroo', 'fungroo@123#');

		$html = 'Hi,<br> 
		Thankyou for subscribing with us.
		<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;margin: 0;padding: 0;height: 100% !important;width: 100% !important;">
		<tbody><tr>
		<td align="center" valign="top" id="bodyCell" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;margin: 0;padding: 20px;border-top: 0;height: 100% !important;width: 100% !important;">
		<!-- BEGIN TEMPLATE // -->
		<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;border: 0;">
		<tbody><tr>
		<td align="center" valign="top" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
		<!-- BEGIN PREHEADER // -->
		<table border="0" cellpadding="0" cellspacing="0" width="600" id="templatePreheader" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #ff7f50;border-top: 0;border-bottom: 0;">
		<tbody><tr>
		<td valign="top" class="preheaderContainer" style="padding-top: 9px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
		<tbody class="mcnTextBlockOuter">
		<tr>
		<td valign="top" class="mcnTextBlockInner" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">

		<table align="left" border="0" cellpadding="0" cellspacing="0" width="366" class="mcnTextContentContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
		<tbody><tr>

		<td valign="top" class="mcnTextContent" style="padding-top: 9px;padding-left: 18px;padding-bottom: 9px;padding-right: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #1f1f61;font-family: Helvetica;font-size: 11px;line-height: 125%;text-align: left;">

		Fungroo : Tablet Based Feedback System
		</td>
		</tr>
		</tbody></table>

		<table align="right" border="0" cellpadding="0" cellspacing="0" width="197" class="mcnTextContentContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
		<tbody><tr>

		<td valign="top" class="mcnTextContent" style="padding-top: 9px;padding-right: 18px;padding-bottom: 9px;padding-left: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #1f1f61;font-family: Helvetica;font-size: 11px;line-height: 125%;text-align: left;">

		<a href="http://us3.campaign-archive1.com/?u=52d1f0517fe03766fd1a3f232&amp;id=490367412d&amp;e=[UNIQID]" target="_blank" style="word-wrap: break-word;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #000080;font-weight: normal;text-decoration: underline;">View this email in your browser</a>
		</td>
		</tr>
		</tbody></table>

		</td>
		</tr>
		</tbody>
		</table></td>
		</tr>
		</tbody></table>
		<!-- // END PREHEADER -->
		</td>
		</tr>
		<tr>
		<td align="center" valign="top" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
		<!-- BEGIN HEADER // -->
		<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #1f1f61;border-top: 0;border-bottom: 0;">
		<tbody><tr>
		<td valign="top" class="headerContainer" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
		<tbody class="mcnImageBlockOuter">
		<tr>
		<td valign="top" style="padding: 9px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnImageBlockInner">
		<table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
		<tbody><tr>
		<td class="mcnImageContent" valign="top" style="padding-right: 9px;padding-left: 9px;padding-top: 0;padding-bottom: 0;text-align: center;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">


		<img align="center" alt="" src="https://gallery.mailchimp.com/52d1f0517fe03766fd1a3f232/images/logo_1_defa26.png" width="198" style="max-width: 198px;padding-bottom: 0;display: inline !important;vertical-align: bottom;border: 0;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" class="mcnImage">


		</td>
		</tr>
		</tbody></table>
		</td>
		</tr>
		</tbody>
		</table></td>
		</tr>
		</tbody></table>
		<!-- // END HEADER -->
		</td>
		</tr>
		<tr>
		<td align="center" valign="top" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
		<!-- BEGIN BODY // -->
		<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateBody" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #f5f5dc;border-top: 0;border-bottom: 0;">
		<tbody><tr>
		<td valign="top" class="bodyContainer" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
		<tbody class="mcnTextBlockOuter">
		<tr>
		<td valign="top" class="mcnTextBlockInner" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">

		<table align="left" border="0" cellpadding="0" cellspacing="0" width="600" class="mcnTextContentContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
		<tbody><tr>

		<td valign="top" class="mcnTextContent" style="padding: 9px 18px;color: #333333;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;font-family: Helvetica;font-size: 15px;line-height: 150%;text-align: left;">

		<h1 style="text-align: center;margin: 0;padding: 0;display: block;font-family: Helvetica;font-size: 40px;font-style: normal;font-weight: bold;line-height: 125%;letter-spacing: -1px;color: #1f1f61 !important;"><span style="color:#FF8C00"><span style="font-family:times new roman,times,baskerville,georgia,serif"><font size="5">We welcome you to become part of Fungroo !</font></span></span></h1>

		<div style="text-align: center;"><span style="color:#FF8C00"><strong>Our representative from sales team will soon get in touch with you.</strong></span><br>
		&nbsp;</div>

		<h3 class="null" style="margin: 0;padding: 0;display: block;font-family: Helvetica;font-size: 18px;font-style: normal;font-weight: bold;line-height: 125%;letter-spacing: -.5px;text-align: left;color: #606060 !important;"><span style="color:#696969"><span style="font-size:14px"><span style="font-family:arial,helvetica neue,helvetica,sans-serif"><span style="line-height:normal">Fungroo is&nbsp;a Patient&nbsp;Feedback&nbsp;Management System, to&nbsp;capture Patient Experience across all the touch points in real time, integrate the feedback data&nbsp;collected and analyze it&nbsp;to get the overview. We help hospitals to improve their<em><strong> PATIENT SATISFACTION by 30%</strong></em>. Yes, that true....see&nbsp;how.</span></span></span></span></h3>

		<ul>
		<li style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><span style="color:#696969"><span style="font-family:arial,helvetica neue,helvetica,sans-serif">We make sure that&nbsp;no patient leaves your hospital dissatisfied.</span></span></li>
		<li style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><span style="color:#696969"><span style="font-family:arial,helvetica neue,helvetica,sans-serif">We equip your staff to interact with dissatisfied patients in real time and&nbsp;know their grievances before they tell others.</span></span></li>
		<li style="-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><span style="color:#696969"><span style="font-family:arial,helvetica neue,helvetica,sans-serif">Our analytics engine identifies top three parameter,&nbsp;that affect customer satisfaction and directly impact&nbsp;revenue of hospitals.</span></span></li>
		</ul>

		<div style="text-align: center;"><span style="color:#000080"><strong><span style="font-family:arial,helvetica neue,helvetica,sans-serif"><font size="4">&nbsp; Fungroo&nbsp;cost you just 1/3 rd the cost of Paper Feedback Forms.</font></span></strong></span></div>

		<div style="text-align: center;">&nbsp;</div>

		</td>
		</tr>
		</tbody></table>

		</td>
		</tr>
		</tbody>
		</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
		<tbody class="mcnTextBlockOuter">
		<tr>
		<td valign="top" class="mcnTextBlockInner" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">

		<table align="left" border="0" cellpadding="0" cellspacing="0" width="600" class="mcnTextContentContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
		<tbody><tr>

		<td valign="top" class="mcnTextContent" style="padding: 9px 18px;color: #333333;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;font-family: Helvetica;font-size: 15px;line-height: 150%;text-align: left;">

		<h1 style="text-align: left;margin: 0;padding: 0;display: block;font-family: Helvetica;font-size: 40px;font-style: normal;font-weight: bold;line-height: 125%;letter-spacing: -1px;color: #1f1f61 !important;"><span style="font-size:18px"><font face="arial, helvetica neue, helvetica, sans-serif">Few of Our Clients</font></span><br>
		&nbsp;&nbsp;<img align="none" height="50" src="https://gallery.mailchimp.com/52d1f0517fe03766fd1a3f232/images/NU_hospital.png" style="width: 50px;height: 50px;border: 0;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" width="50">&nbsp;&nbsp;<img align="none" height="50" src="https://gallery.mailchimp.com/52d1f0517fe03766fd1a3f232/images/brookefield.png" style="width: 50px;height: 50px;border: 0;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" width="50">&nbsp; &nbsp;<img align="none" height="50" src="https://gallery.mailchimp.com/52d1f0517fe03766fd1a3f232/images/Vasan_eye_care.png" style="width: 50px;height: 50px;border: 0;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" width="50">&nbsp; &nbsp;<img align="none" height="50" src="https://gallery.mailchimp.com/52d1f0517fe03766fd1a3f232/images/shathayu.png" style="width: 50px;height: 50px;border: 0;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" width="50">&nbsp; &nbsp;<img align="none" height="50" src="https://gallery.mailchimp.com/52d1f0517fe03766fd1a3f232/images/cambridge.png" style="width: 50px;height: 50px;border: 0;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" width="50">&nbsp; &nbsp;<img align="none" height="50" src="https://gallery.mailchimp.com/52d1f0517fe03766fd1a3f232/images/Rajshekar.png" style="width: 50px;height: 50px;border: 0;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" width="50">&nbsp; &nbsp;<img align="none" height="50" src="https://gallery.mailchimp.com/52d1f0517fe03766fd1a3f232/images/Shalby.png" style="width: 50px;height: 50px;border: 0;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" width="50">&nbsp;&nbsp;</h1>

		<div><span style="font-size:11px"><span style="font-family:arial,helvetica neue,helvetica,sans-serif">We have deployed our system in almost 30+ clients and till date 25,000+ customers have given us feedback. We have clients like Columbia Asia Hospital, Brook-field Hospital,Vasan eye care,Kosmoderma, Shalby(Ahmadabad), Hosmat hospital ,NU Hospitals, MGM resorts(Chennai), ITC hotel, Marrybrown, Aroy, etc.</span></span></div>

		<div>&nbsp;</div>

		</td>
		</tr>
		</tbody></table>

		</td>
		</tr>
		</tbody>
		</table></td>
		</tr>
		</tbody></table>
		<!-- // END BODY -->
		</td>
		</tr>
		<tr>
		<td align="center" valign="top" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
		<!-- BEGIN FOOTER // -->
		<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateFooter" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #ff7f50;border-top: 2px inset #1f1f61;border-bottom: 2px inset #1f1f61;">
		<tbody><tr>
		<td valign="top" class="footerContainer" style="padding-bottom: 9px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
		<tbody class="mcnTextBlockOuter">
		<tr>
		<td valign="top" class="mcnTextBlockInner" style="mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">

		<table align="left" border="0" cellpadding="0" cellspacing="0" width="600" class="mcnTextContentContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
		<tbody><tr>

		<td valign="top" class="mcnTextContent" style="padding: 9px 18px;color: #000080;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;font-family: Helvetica;font-size: 11px;line-height: 125%;text-align: left;">

		<em>Copyright © 2014 FUNGROO, All rights reserved.</em><br>
		<br>
		<a class="utilityLink" href="http://fungroo.us3.list-manage.com/unsubscribe?u=52d1f0517fe03766fd1a3f232&amp;id=5a7f6cc269&amp;e=[UNIQID]&amp;c=490367412d" style="word-wrap: break-word;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #606060;font-weight: normal;text-decoration: underline;">unsubscribe from this list</a>&nbsp;&nbsp;&nbsp; <a class="utilityLink" href="http://fungroo.us3.list-manage.com/profile?u=52d1f0517fe03766fd1a3f232&amp;id=5a7f6cc269&amp;e=[UNIQID]" style="word-wrap: break-word;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;color: #606060;font-weight: normal;text-decoration: underline;">update subscription preferences</a>&nbsp;<br>
		<br>
		&nbsp;
		</td>
		</tr>
		</tbody></table>

		</td>
		</tr>
		</tbody>
		</table></td>
		</tr>
		</tbody></table>
		<!-- // END FOOTER -->
		</td>
		</tr>
		</tbody></table>
		<!-- // END TEMPLATE -->
		</td>
		</tr>
		</tbody>
		<br>
		<br>
		Regards,<br>
		Fungroo Team.
		';

		$mailTo = array($email_id,'chanchal.santra@gmail.com');
		$mail = new SendGrid\Mail();
		$mail->setTos($mailTo)->
		setFrom('noreply@alitumsolutions.com')->
		setFromName('Fungroo')->
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