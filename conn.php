<?php
$database = mysqli_connect('localhost','root','','phptest');

if($database ->connect_error){
    die('Connection Filed : '.$database ->connect_error);
}
?>