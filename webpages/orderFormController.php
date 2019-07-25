<?php
## CONFIG ##
include("connectiondb.php");

# LIST EMAIL ADDRESS
$recipient = "order@designdok.com";

# SUBJECT (Subscribe/Remove)
$subject = "Order Form";
// $ebpage = "App development";

# RESULT PAGE
$location = "/thankyou";

## FORM VALUES ##

# SENDER - WE ALSO USE THE RECIPIENT AS SENDER IN THIS SAMPLE
# DON'T INCLUDE UNFILTERED USER INPUT IN THE MAIL HEADER!
$sender = "support@designdok.com";

# MAIL BODY
$subscriber_email = $_REQUEST['oEmail'];
$subscriber_subject = "Thankyou!! One of Our Consultant Will Get Back To you Shortly";
$subscriber_email_data = file_get_contents('https://www.designdok.com/email/queryFormThankyou.html');



switch ($_REQUEST['oPackage']) {

    case 'Revamp Logo Package - $39.99':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=dfe2119c-71c5-11e9-80ac-0cc47ac0118b";
    break; 

    case 'Startup Logo Package - $39.99':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=f9c2da45-71c5-11e9-80ac-0cc47ac0118b";
    break; 

    case 'Professional Logo Package - $119.99':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=149aac87-71c6-11e9-80ac-0cc47ac0118b";
    break; 

    case 'Identity Logo Package - $169.99':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=2d4a87b3-71c6-11e9-80ac-0cc47ac0118b";
    break; 

    case 'Corporate Logo Package - $219.99':
        $location = "designquotations.com/terminal/paynow/index.php?id=450a0109-71c6-11e9-80ac-0cc47ac0118b";
    break; 

    case 'Elite Logo Package - $419.99':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=6e1678f8-71c6-11e9-80ac-0cc47ac0118b";
    break; 

    case 'Basic Web Package - $199.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=e560cac7-9dd6-11e9-b9f9-0cc47ac0118b";
    break; 

    case 'Startup Web Package - $399.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=28b1fcab-9dd7-11e9-b9f9-0cc47ac0118b";
    break; 

    case 'Professional Web Package - $699.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=75830fa2-9844-11e9-b9f9-0cc47ac0118b";
    break; 

    case 'Elite Web Package - $1299.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=919441f0-9844-11e9-b9f9-0cc47ac0118b";
    break; 

    case 'Corporate Web Package - $1999.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=b02f2f53-9844-11e9-b9f9-0cc47ac0118b";
    break; 

    case 'Business Web Package - $2499.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=d88c532b-9844-11e9-b9f9-0cc47ac0118b";
    break; 

    case 'Startup E-Commerce Package - $794.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=55c1995b-71c7-11e9-80ac-0cc47ac0118b";
    break; 

    case 'Professional E-Commerce Package - $1394.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=71279c50-71c7-11e9-80ac-0cc47ac0118b";
    break;

    case 'Elite E-Commerce Package - $2499.99':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=9b913828-71c7-11e9-80ac-0cc47ac0118b";
    break;

    case 'Teaser Video Package - $149.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=d540b977-71c7-11e9-80ac-0cc47ac0118b";
    break;

    case 'Startup Video Package - $399.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=f102c905-71c7-11e9-80ac-0cc47ac0118b";
    break;

    case 'Classic Video Package - $799.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=0b3f4fdf-71c8-11e9-80ac-0cc47ac0118b";
    break;

    case 'Premium Video Package - $1495.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=4015f097-71c8-11e9-80ac-0cc47ac0118b";
    break;

    case 'Deluxe Video Package - $1995.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=565ce5fe-71c8-11e9-80ac-0cc47ac0118b";
    break;

    case 'Seo Startup Package - $350.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=999b94b4-71c8-11e9-80ac-0cc47ac0118b";
    break;

    case 'Scaling Startup Package - $700.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=b3233cc7-71c8-11e9-80ac-0cc47ac0118b";
    break;

    case 'Venture Startup Package - $1200.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=d4e1effe-71c8-11e9-80ac-0cc47ac0118b";
    break;

    case 'Basic 3D Package - $2995.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=193341cb-71c9-11e9-80ac-0cc47ac0118b";
    break;

    case 'Standard 3D Package - $4995.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=3a8bb088-71c9-11e9-80ac-0cc47ac0118b";
    break;

    case 'Premium 3D Package - $6995.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=59885403-71c9-11e9-80ac-0cc47ac0118b";
    break;

    case 'Startup Collateral Package - $99.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=9c8982bf-71c9-11e9-80ac-0cc47ac0118b";
    break;

    case 'Collateral Classic Package - $199.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=b64abd66-71c9-11e9-80ac-0cc47ac0118b";
    break;

    case 'Premium Collateral Package - $399.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=da7c0b7c-71c9-11e9-80ac-0cc47ac0118b";
    break;

    case 'Unlimited Collateral Package - $499.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=f6846302-71c9-11e9-80ac-0cc47ac0118b";
    break;

    case 'Book Cover Design - $400.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=35c3765e-71ca-11e9-80ac-0cc47ac0118b";
    break;

    case 'Premium Book Video - $3900.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=4b58811d-71ca-11e9-80ac-0cc47ac0118b";
    break;

    case 'Author Website - $900.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=65d41c7e-71ca-11e9-80ac-0cc47ac0118b";
    break;

    case 'Professional Audio Book - $7000.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=7d8a3b38-71ca-11e9-80ac-0cc47ac0118b";
    break; 

    case 'Custom Book Illustrattion - $500.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=97309e6d-71ca-11e9-80ac-0cc47ac0118b";
    break; 

    case 'Book Publishing - $500.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=c57922da-71ca-11e9-80ac-0cc47ac0118b";
    break; 

    case 'Book Marketing - $2400.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=e0947dc6-71ca-11e9-80ac-0cc47ac0118b";
    break; 

    case 'Copyrights Certificate - $900.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=fad55d15-71ca-11e9-80ac-0cc47ac0118b";
    break; 
    
    case 'Basic Combo Package - $644.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=fb0f28e4-7349-11e9-80ac-0cc47ac0118b";
    break; 
    
    case 'Startup Combo Package - $994.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=149a1093-734a-11e9-80ac-0cc47ac0118b";
    break; 
    
    case 'Professional Combo Package - $1394.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=2b68a313-734a-11e9-80ac-0cc47ac0118b";
    break; 
    
    case 'Corporate Combo Package - $1994.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=53dd3796-734a-11e9-80ac-0cc47ac0118b";
    break; 
    
    case 'Elite Combo Package - $4999.00':
        $location = "https://www.designquotations.com/terminal/paynow/index.php?id=a6795e87-7350-11e9-80ac-0cc47ac0118b";
    break; 


    


    


    
    default:
        $location = "/thankyou";
        break;

}







$body .= "Name: ".$_REQUEST['oName']." \n";
$body .= "Phone: ".$_REQUEST['oNumber']." \n";
$body .= "Email: ".$_REQUEST['oEmail']." \n";
$body .= "Package: ".$_REQUEST['oPackage']." \n";
$body .= "Project Details: ".$_REQUEST['oprojectdetails']." \n";





// $body .= "PublishingGoals: ".$checkPublishingGoal." \n";

if($_FILES["file"]["error"]>0)
{
    echo "FILE ERROR";
    die();
}
// $filename = "FOLDER/".$_FILES["file"]["name"];

 $info = pathinfo($_FILES['wordfile']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = time().'.'.$ext; 

$target = '../Folder/'.$newname;
// move file to a folder
if (!move_uploaded_file($_FILES["wordfile"]["tmp_name"], $target)) { 
    //  echo "Sorry, there was an error uploading your file.";
    //  die();
    $target = 'No file attached';
 }

$body .= "file: ".$target." \n";





if (mysqli_connect_errno()){  echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
else{ $sql = 'insert into orderForm (cust_name ,cust_number ,cust_email ,package_detail ,project_detail,attachment_URL) values ("'.$_REQUEST['oName'].'","'.$_REQUEST['oNumber'].'","'.$_REQUEST['oEmail'].'","'.$_REQUEST['oPackage'].'","'.$_REQUEST['oprojectdetails'].'","'.$target.'")';

mysqli_query($con,$sql);
mysqli_close($con);
}


$headers = "From: " . $sender . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
# add more fields here if required
## SEND MESSGAE ##




/**
 * This example shows making an SMTP connection with authentication.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'phpmailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "mail.designdok.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "support@designdok.com";
//Password to use for SMTP authentication
$mail->Password = "B11^TMw=qvM1";

//Set who the message is to be sent from
$mail->setFrom('support@designdok.com', 'Design Dok');
//Set an alternative reply-to address
$mail->addReplyTo('support@designdok.com', 'Design Dok');
//Set who the message is to be sent to
$mail->addAddress('order@designdok.com');
// $mail->addAddress('joe@example.net', 'Joe User');
// $mail->addBCC('order@animationdok.com');
//Set the subject line
$mail->Subject = $subject ;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
// $mail->msgHTML($body);
$mail->Body =$body;
//Replace the plain text body with one created manually
// $mail->AltBody = 'This is a plain-text message body';
//Attach an image file
// $mail->addAttachment('images/phpmailer_mini.png');
$mail->send();
//send the message, check for errors
// if (!$mail->send()) {
//     echo "Mailer Error: " . $mail->ErrorInfo;
// } else {
    // echo "Message sent!";
    // header( "Location: $location" );
// }







//Create a new PHPMailer instance
$clientmail = new PHPMailer;
//Tell PHPMailer to use SMTP
$clientmail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$clientmail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$clientmail->Debugoutput = 'html';
//Set the hostname of the mail server
$clientmail->Host = "mail.designdok.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$clientmail->Port = 465;
$clientmail->SMTPSecure = 'ssl';
//Whether to use SMTP authentication
$clientmail->SMTPAuth = true;
//Username to use for SMTP authentication
$clientmail->Username = "support@designdok.com";
//Password to use for SMTP authentication
$clientmail->Password = "B11^TMw=qvM1";
//Set who the message is to be sent from
$clientmail->setFrom('support@designdok.com', 'Design Dok');
//Set an alternative reply-to address
$clientmail->addReplyTo('support@designdok.com', 'Design Dok');
//Set who the message is to be sent to
$clientmail->addAddress($subscriber_email);
// $clientmail->addAddress('joe@example.net', 'Joe User');
// $clientmail->addBCC('order@animationdok.com');
//Set the subject line
$clientmail->Subject =$subscriber_subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
// $clientmail->msgHTML($body);
$clientmail->msgHTML(file_get_contents('https://www.designdok.com/email/queryFormThankyou.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
// $clientmail->AltBody = 'This is a plain-text message body';
//Attach an image file
// $clientmail->addAttachment('images/phpmailer_mini.png');
$clientmail->send();
//send the message, check for errors
// if (!$clientmail->send()) {
//     echo "Mailer Error: " . $clientmail->ErrorInfo;
// } else {
    // echo "Message sent!";
    header( "Location: $location" );
// }








?>
