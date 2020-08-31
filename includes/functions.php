<?php
session_start();

include('conect.php');

// function exucute requet sql 
function query($sql){
    global $con;
    return mysqli_query($con,$sql);
}
// function redirect 
function redirect($page){
    header('location:'.$page);
}
function show_product_with_cat($con,$category){
    $sql = "SELECT * FROM postvehicule WHERE category = '$category' ";
    $result = mysqli_query($con,$sql);
    if($result != null){
        return $result;
    }else{
        echo "error".mysqli_error($con);
    }
}
