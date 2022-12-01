<?php  
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "configure.php";
    $outgoing_id =mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id =mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message =mysqli_real_escape_string($conn, $_POST['message']); //   inside the [] we put the name we gave the components

    if(!empty($message)){
        $sql =mysqli_query($conn, "INSERT INTO messages (incoming_id, outgoing_id, message)
                   VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();

    }else{

    }
}else{
    header("../login.php");
}


?>