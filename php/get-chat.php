<?php  
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "configure.php";
    $outgoing_id =mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id =mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";

    //left join joins two table in the sql.. this will help get image of the incoming message
    $sql = "SELECT * FROM messages
    LEFT JOIN users ON users.unique_id = messages.incoming_id  
     WHERE (outgoing_id = {$outgoing_id} AND  incoming_id = {$incoming_id})
     OR (outgoing_id = {$incoming_id} AND  incoming_id = {$outgoing_id}) ORDER BY message_id";

     $query = mysqli_query($conn, $sql);

     if(mysqli_num_rows($query) > 0){
        while ($row = mysqli_fetch_assoc($query)){
            if($row['outgoing_id'] === $outgoing_id){  //he is the message sender
                $output .= '<div class="chat outgoing">
                            <div class="details">
                            <p>'. $row['message'].'</p>
                             </div>
                             </div>';

            }else{ // he is the one reciving the message
                $output .= '<div class="chat incoming">
                            <img src="php/images/'. $row['image'].'" alt="">
                            <div class="details">
                             <p>'. $row['message'].'</p>
                             
                             </div>
                            </div>';

            }
        }
        echo $output;
     }
   
   
}else{
    header("../login.php");
}


?>