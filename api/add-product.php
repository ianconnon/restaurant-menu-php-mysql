<?php

include("connection.php");

$name = trim($_POST['name']);
$about = trim($_POST['about']);
$type = trim($_POST['type']);
$price = trim($_POST['price']); 

if(!empty($name)){
    if(!empty($about)){
        if(!empty($price)){

            if($type == "foods" || $type == "beverages" || $type == "desserts"){

                $sql = "INSERT INTO $type (name, description, price) VALUES ('$name', '$about', '$price')";
                $insert = $connection->query($sql);

                if($insert){
                    echo true;
                }

            }else{
                echo "Invalid type selection";
            }

        }else{
            echo "The price is empty";
        }
    }else{
        echo "The description is empty";
    }
}else{
    echo "The name is empty";
}