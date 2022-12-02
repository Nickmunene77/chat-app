<?php

if(isset($_SESSION['unique_id'])){ //if user is logged in
    header("location: user.php");

}

?>


<?php include_once "header.php"; ?>
<body>
    
    <div class="wrapper">
        <section class="login">
            <header id="login-header">Nix Chati Chati</header>
            <form action="#" >
                <div class="mistake-text"></div>
                    
                    

                        
                        <div class="inputs">
                            <label> Enter your Email</label>
                            <input type="email" name="email" placeholder="abc@gmail.com">
                        </div>
                        <div class="inputs">
                            <label>Enter your password</label>
                            <input type="password" id="password" name="password" placeholder="Enter a strong password">
                            <i id="eye" class="fa fa-eye"></i>
                        </div>

                     

                        <div class="submit">
                            
                            <input type="submit" onClick="myFunction()" value="Start a chat"> 
                        </div>
                        
                     </form>


                     <div class="link">Dont have an account? <a href="index.php">Sign Up</a></div>
        </section>
    </div>

    <script src="./javascript/showPassword.js"></script>
    <script src="./javascript/login.js"></script>
    
</body>
</html>