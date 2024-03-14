<?php
include_once("config.php");
 
$id = $_GET['id'];
$accion=$_GET['accion'];
echo $accion;
if($accion=='1'){
    $result = mysqli_query($conn, "DELETE FROM users WHERE id=$id");

 }else{
    $result = mysqli_query($conn, "DELETE FROM animals WHERE id=$id");

 }
 
header("Location:index.php");
?>