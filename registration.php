<?php
require('Connection.php');
session_start();
#for login


#for registration
if(isset($_POST['register']))
    {
        $user_exist_query="SELECT * FROM `registration` WHERE `username`='$_POST[username]' OR `emailid`='$_POST[emailid]'";
        $result=mysqli_query($con,$user_exist_query);

        if($result)
        {
            if(mysqli_num_rows($result)>0)
            { #it will be executed if username or email or conatct number is already taken
                $result_fetch=mysqli_fetch_assoc($result);
                if($result_fetch['username']==$POST['username'])
                {   #it will be executed if username is already taken
                    echo"
                    <script>
                    alert('$result_fetch[username] - username already taken');
                     window.location.href = 'register.php';
                    </script>
                    ";
                }
                else
                {#it will be executed if email is already taken
                    echo"
                    <script>
                    alert('$result_fetch[emailid]-email already registered');
                    window.location.href = 'register.php';
                    </script>
                    ";
                }
  
            }
        else
            {   #it will be executed if no one has taken username or email id or contact number

                $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
                $query="INSERT INTO `registration`(`name`, `username`, `emailid`, `password`, `address`, `contact`, `gender`, `dob`, `city`, `country`) VALUES ('$_POST[name]','$_POST[username]','$_POST[emailid]','$password','$_POST[address]','$_POST[contact]','$_POST[gender]','$_POST[dob]','$_POST[city]','$_POST[country]')";
                echo "Query.$query";
                if(mysqli_query($con,$query))
                {
                    #if data inseted successfully
                    echo"
                    <script>
                    alert('Registration successful');
                    window.location.href = 'login.php';
                    </script>
                    ";
                    }
                else
                {
                #if data cannot be inserted
                    /*echo"
                    <script>
                    alert('Cannot Run Query');
                    window.location.href = 'register.php';
                    </script>
                    ";*/
                }
            }
        }


    else{
        echo"
            <script>
            alert('Cannot Run Query');
            window.location.href = 'register.php';
            </script>
            ";
        }
}
?>
