<?php
  //this data is shared by many files to reduce repetition we did this
  //was first in the user.php on the element part




  while($row = mysqli_fetch_assoc($sql)){
    $sql2 = "SELECT * FROM messages WHERE (incoming_id = {$row['unique_id']}
              OR outgoing_id = {$row['unique_id']}) AND  (outgoing_id = {$outgoing_id}
              OR incoming_id = {$outgoing_id})  ORDER BY message_id DESC LIMIT 1"; //we have defined the outgoing id in the user.php

$query2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($query2);

if(mysqli_num_rows($query2)>0){
  $result = $row2['message'];
}else{
  $result = "No message to show";
}

//this would trim message if words more than 28
//showing thw message on the open page without entering the chat
(strlen($result) > 28) ? $message = substr($result, 0, 28) .'...' : $message = $result;

//adding you text before before if login id send message
($outgoing_id == $row2['outgoing_id']) ? $you = "You: "  : $you = "";

//check user is online or not
($row['status'] == "Offline")  ? $offline = "offline" : $offline = "";

    $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
               <div class="content">
               <img src="php/images/'. $row['image'].'  " alt="">
               <div class="details">
              <span>'. $row['fname']. "  " . $row['lname'].'</span>
              <p>'.$you . $message.'</p>

              </div>
              </div>
              <div class="status-dot '.$offline.'"><i class="fa fa-circle"></i></div>
                </a>';

}
?>