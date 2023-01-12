<?php

include('connection.php');

$email = trim($_POST['email']);
$password = trim($_POST['password']);


if(!empty($email)){
    if(!empty($password)){

        $sql = "SELECT * FROM admin WHERE email = '$email' and password = '$password'";
        $query = $connection->query($sql);

        if($query){
            $row=mysqli_fetch_array($query);
	        $count=mysqli_num_rows($query);

            if($count == 1){
                session_start();
                $_SESSION['admin'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                echo true;

            }else{
                echo false;
            }
        }else{
            echo false;
        }

    }else{
        echo false;
    }
}else{
    echo false;
}