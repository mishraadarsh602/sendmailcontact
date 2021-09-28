
<?php
if(isset($_POST["submit"])){
// Checking For Blank Fields..
if($_POST["vname"]==""||$_POST["vemail"]==""||$_POST["vorg"]==""||$_POST["vmob"]==""||$_POST["vmsg"]==""){
echo "Fill All Fields..";
}else{
// Check if the "Sender's Email" input field is filled out
$email=$_POST['vemail'];
// Sanitize E-mail Address
$email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
$email= filter_var($email, FILTER_VALIDATE_EMAIL);


if (!$email){
echo "Invalid Sender's Email";
}
else{
 $vorg = $_POST['vorg'];
$vmob = $_POST['vmob'];
$vname=$_POST['vname'];
$subject = "GMR ENQUIRY FORM";
$message1 = $_POST['vmsg'];

//$headers = 'From:'. $email2 . "rn"; // Sender's Email
//$headers .= 'Cc:'. $email2 . "rn"; // Carbon copy to Sender

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Message lines should not exceed 70 characters (PHP rule), so wrap it
//$message = wordwrap($message, 2000);
$message='

<table width="500" border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
  <tr>
    <td><table width="500" border="0" cellspacing="0" cellpadding="8">
      <tr>
        <td colspan="2" bgcolor="#CDD9F5"><strong>Contact us Form</strong></td>
      </tr>
      <tr>
        <td width="168" bgcolor="#FFFFEC"><strong>Name:</strong></td>
        <td width="290" bgcolor="#FFFFEC">'.$vname.'</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFDD"><strong>Email:</strong></td>
        <td bgcolor="#FFFFDD">'.$email.'</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFEC"><strong>Mobile no: </strong></td>
        <td bgcolor="#FFFFEC">'.$vmob.'</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFDD"><strong>Organisation: </strong></td>
        <td bgcolor="#FFFFDD">'.$vorg.'</td>
      </tr>
     
      <tr>
        <td bgcolor="#FFFFDD"><strong>message: </strong></td>
        <td bgcolor="#FFFFDD">'.$message1.'</td>
      </tr>
     
       </table></td>
  </tr>
</table>';


// Send Mail By PHP Mail Function
mail("nitinreddy@gmrcap.in", $subject, $message, $headers);
echo "Your mail has been sent successfuly ! Thank you for your feedback";
echo '<script>alert("Thank you for your feedback")</script>';

}
}
}
  header("location:contact-us.html");
?>

