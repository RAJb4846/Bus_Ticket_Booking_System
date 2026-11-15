<?php
   include('Connection.php');

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;
   function sendMail($emailid,$reset_token)
   {
      require 'PHPMailer/PHPMailer.php';
      require 'PHPMailer/SMTP.php';
      require 'PHPMailer/Exception.php';
      $mail = new PHPMailer(true);

      try 
      {
        //Server settings
       
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   =  true;                                   //Enable SMTP authentication
        $mail->Username   = 'rajdbattin@gmail.com';                     //SMTP username
        $mail->Password   = 'RAJb484631032002';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('rajdbattin@gmail.com', 'BUS TRAVELS');
        $mail->addAddress($emailid);     //Add a recipient
       
        //Content
        $mail->isHTML(true);                                  //Set emailididid format to HTML
        $mail->Subject = 'Password Reset Link From BUS TRAVELS';
        $mail->Body    = "We got a request from you to reset password! <br>
        Click The link Below:  <br>
        <a href='http://localhost/BUS_TRAVELS/updatepassword.php'>Reset Password</a>";
       
    
        $mail->send();
        return true;
      }    

    catch (Exception $e)     
        {
        return false;
        }
        
        }

   if(isset($_POST['send-reset-link']))
   {
       $query="SELECT * FROM `registration` WHERE `emailid`='$_POST[emailid]' ";
       $result=mysqli_query($con,$query);
       if($result)
       {
          if(mysqli_num_rows($result)==1)
          {
               $reset_token=bin2hex(random_bytes(16));
               date_default_timezone_set('Asia/kolkata');
               $date=date("Y-m-d");
               $query="UPDATE `registration` SET `resettoken`='$reset_token',`resettokenexpire`='$date' WHERE `emailid`='$_POST[emailid]'";
               if(mysqli_query($con,$query) && sendMail($_POST['emailid'],$reset_token))
               {
                echo"
                <script>
                  alert('Password reset link send to mail');
                  window.location.href='login.php';
                </script>
                
                ";
               }
               else{
                echo"
                <script>
                  alert('Server Down Try Again later');
                  window.location.href='login.php';
                </script>
                
                ";
               }
          }
          else         
          {
            echo"
            <script>
              alert('Invalid emailid Entered');
              window.location.href='login.php';
            </script>
            
            ";
          }
       }
       else{
        echo"
        <script>
          alert('Cannot run');
          window.location.href='login.php';
        </script>
        
        ";
       }
   }
?>