<?php

        // servername => localhost
        // username => root
        // password => empty
        // database name => bus
        $conn = mysqli_connect("localhost", "root", "", "bus");

        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

        // Taking all 2 values from the form data(input)
        $username =  $_REQUEST['username'];
        $password = $_REQUEST['password'];


        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO clogin VALUES ('$username','$password')";

        if(mysqli_query($conn, $sql)){
            echo "<h2>DATA HAS BEEN STORED SUCCESSFULL.</h2>";
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        ?>