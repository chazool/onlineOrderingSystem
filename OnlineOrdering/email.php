 <?php session_start()?>
 
 
<?php
 include_once("dbConection.php");
  require './sendgrid-php/vendor/autoload.php';
  use SendGrid\Mail\Content;
  use SendGrid\Mail\From;
  use SendGrid\Mail\Mail;
  use SendGrid\Mail\To;
//  $apiKey = "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";
//  $sg = new SendGrid($apiKey);


if(isset($_POST['insert']))
{
    
    // get values form input text and number
     
	$Doctor_id = $_POST['Doctor_id'];
	$Doctor_Fname = $_POST['Doctor_Fname'];
    $Doctor_Lname = $_POST['Doctor_Lname'];

    // mysql query to insert data

    $query =  "INSERT INTO appointment (Doctor_id,Doctor_Fname,Doctor_Lname ) VALUES('".$Doctor_id."','".$Doctor_Fname."','".$Doctor_Lname."')";

 $result = mysqli_query($conn,$query);
  if($result)
    {
    
    echo 'Data Inserted';
 
        $subject = "ABC Cafeteria Food Order";
        $fromEmail = "abc.cafeteria94@gmail.com";
        $toEmail = $_SESSION["email"];
        $htmlContent = "<strong>Hello ".$_SESSION["name"].",<br><br><div>Your order has been successfully set. <br>Thank you!</strong><br/></hr><div>";
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

      
    }
    else{
        echo 'Data Not Inserted';
    }

    //mysqli_free_result($result);
    mysqli_close($conn);
}


 ?>

