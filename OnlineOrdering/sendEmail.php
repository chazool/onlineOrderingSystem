<?php
 
  require './sendgrid-php/vendor/autoload.php';
  use SendGrid\Mail\Content;
  use SendGrid\Mail\From;
  use SendGrid\Mail\Mail;
  use SendGrid\Mail\To;
   
//  $apiKey = "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";
//  $sg = new SendGrid($apiKey);

 $email = $_POST['email'];
	 
        $subject = "ABC Cafeteria";
        $fromEmail = "abc.cafeteria94@gmail.com";
        $toEmail = $_POST["email"];
		$toorderId = $_POST["orderId"];
		$tostatus = $_POST["status"];
        $htmlContent = "<strong>Hello <br> Your Bill No : ".$toorderId." <br> Status : ".$tostatus." <br> Thank You</strong> ";
        $from = new From($fromEmail);
        $to = new To($toEmail);
        $content = new Content("text/html", $htmlContent);
        $mail = new Mail($from, $to, $subject);
        $mail->addContent($content);
        $sg = new SendGrid("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");
      


        try {
            $response = $sg->client->mail()->send()->post($mail);
            if ($response->statusCode() == 202) {
                echo '<br>'."A printable copy of this order has been sent to your email";
            } else {
                echo '<br>'."Mail not sent!";
            }
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

 ?>