<?php 
session_start();
if(!isset($_SESSION['unique_id'])){  //session will be set when user login or signup if not set we redirect user to login page
    header("location: login.php");
}
?>

<?php include_once "header.php"; ?>
<body>
    
    
    <div class="wrapper">
        <section class="chat-area">
            <header>

            <?php
            include_once "php/configure.php";
              //select data of the current loged user using session
              $user_id =mysqli_real_escape_string($conn, $_GET['user_id']);
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id ={$user_id}");  
              if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
              }

            ?>
                <a href="user.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/images/<?php echo $row['image'] ?>" alt="">
                <div class="details">
                    <span><?php echo $row['fname']. " " . $row['lname']?></span>
                    <p>Active now</p>
                </div>
            
            
            </header>
          
            <div class="chat-box">
               
            </div>

            <form action="#" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php  echo $_SESSION['unique_id']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php  echo $user_id; ?>" hidden>
                <input type="text" name="message" class="chat-message" placeholder="Type a message...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>


        </section>
    </div>

   <script src="./javascript/chat.js"></script>

                
                    
                </body>
                </html>