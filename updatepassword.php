<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Password update</title>
</head>
<body>
    <?php
    require('Connection.php');

    if(isset($_GET['emailid']) && isset($_GET['reset_token']))
    {
    date_default_timezone_set('Asia/kolkata');
    $date=date("Y-m-d");
    $query="SELECT * FROM `registered_user` WHERE `emailid`='$_GET[emailid]' AND `resettoken`='$_GET[reset_token]' AND `resettokenexpire`='$date'";
    $result=mysqli_query($con,$query);
    if($result)
    {
    if(mysqli_num_rows($result)==1)
    {
    echo"
    <form method='POST'>
        <h3>Create New Password</h3>
        <input type='password' placeholder='New Password' name='Password'>
        <button type='submit' name='updatepassword'>Update</button>
        <input type='hidden' name='emailid' value='$_GET[emailid]'>
    </form>
    ";

    
    }
    else{
    echo"
    <script>
                alert('Invalid Or Expire ');
                window.location.href='login.php';
    </script>
    ";
    }
    }
    else{
    echo"
    <script>
            alert('Server Down');
            window.location.href='login.php';
    </script>
    ";
    }
    }
    ?>
</body>
</html>