<?php
session_start();
include_once "configure.php";
$outgoing_id = $_SESSION['unique_id'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id ={$outgoing_id}"); //remove your id account from displaying
$output = "";
if(mysqli_num_rows($sql) == 1){  //if you have only one user
    $output .= "No one to chat with";

}elseif(mysqli_num_rows($sql) > 0){

  include "data.php";

}
echo $output;
?>