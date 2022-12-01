<?php 
session_start();
if(!isset($_SESSION['unique_id'])){  //session will be set when user login or signup if not set we redirect user to login page
    header("location: login.php");
}
?>

<?php include_once "header.php"; //this will reduce repetion ?>
<body>
    
    <div class="wrapper">
        <section class="users">
            <header>

            <?php
            include_once "php/configure.php";
              //select data of the current loged user using session
            $sql = mysqli_query($conn,"SELECT * FROM users WHERE unique_id ={$_SESSION['unique_id']}" );  
              if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
              }

            ?>
            <div class="content">
                <img src="php/images/<?php echo $row['image'] ?>" alt="">
                <div class="details">
                    <span><?php echo $row['fname']. " " . $row['lname']?></span>
                    <p><?php echo $row['status']?></p>

                </div>
            </div>
            <a href="php/logout.php?logout_id=<?php  echo $row['unique_id']?>" class="logout">Logout</a>
        </header>

            <div class="search">
                <span class="text">Search Here</span>
                <input 
               id="searchNames" type="text" placeholder="Search a name">
                <button id="searchBtn" ><i class="fa fa-search"></i></button>
            </div>  
            <div class="user-lists" >  </div>         

        </section>
    </div>
    <script src="./javascript/user.js"></script>
</body>
</html>