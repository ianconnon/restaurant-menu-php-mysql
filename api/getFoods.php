<?php
include('connection.php');
$response=new stdClass();

//$datos=array();
$data=[];
$i=0;
$sql="select * from foods";
$result=mysqli_query($connection,$sql);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
    $obj->id = $row['id'];
	$obj->name=$row['name'];
    $obj->description = $row['description'];
    $obj->price = $row['price'];
	$data[$i]=$obj;
	$i++;
}
$response->data=$data;

mysqli_close($connection);
header('Content-Type: application/json');
echo json_encode($response);
