<?php

session_start(); // as we used session we should start it

include_once "configure.php"; //it includes the specified file during script exection

$eml = mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($eml) && !empty($pass)){  //if email and password are filled
    //chech if the email and password filled are matching the one in database table
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$eml}' AND password = '{$pass}'");

    if(mysqli_num_rows($sql) > 0){  //users credentials are correct

        $row = mysqli_fetch_assoc($sql);
        //updating user status to active 
        $status = "Active now";
        $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id={$row['unique_id']}");
//now we will work as with signup. get the unique id of current logged user 
//and use it in a sessin to use another php page
        if($sql){ 
       $_SESSION['unique_id'] = $row['unique_id']; // session will use the user unique id in the other php file
       echo "success";
    }
    


    }else{
        echo "invalid user or password";
    }


}else{
    echo "all inputs are required";

}
?>