<?php
    include('database.php');
	$username = $_POST['user'];
	$password = $_POST['pass'];

    echo "user".' '.$username.' ';
    echo "password".' '.$password;
    $check = mysqli_query($con,"SELECT * FROM `admin` WHERE username = '$username'");
    $row = mysqli_fetch_assoc($check);
    
    if($row['username'] == $username){
        if($row['password'] == $password){
            mysqli_close($con);
            header("Location:../admin");    
        }else{
            header("Location:..");
        }
    }else{
        header("Location:..");
    }
?>