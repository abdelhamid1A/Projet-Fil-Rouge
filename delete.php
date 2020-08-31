<?php
include('includes/header.php');
$id = $_GET['id'];
$sql = " DELETE FROM postforum WHERE idPostF = $id";


if(query($sql)){
    redirect('admin.php');
}else{
    echo 'error';
}