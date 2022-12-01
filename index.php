<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="nick-signup">
            <header>Nix Chati Chati</header>
            <form action="#" enctype="multipart/form-data">  <!--use this attribute if you have used input type file in javascript-->
                <div class="mistake-text"></div>
                    
                    <div class="name-details">
                        <div class="first">
                        <div class="inputs">
                            <label>First name</label>
                            <input type="text" name="fname" placeholder="Your FirstName" required>
                        </div>
                        </div>

                        <div class="last">
                        <div class="inputs">
                            <label>Last name</label>
                            <input type="text" name="lname" placeholder="Your LastName" required>
                        </div>
                        </div>
                    </div>

                        
                        <div class="inputs">
                            <label> Enter an Email</label>
                            <input type="email" name="email" placeholder="abc@gmail.com" required>
                        </div>
                        <div class="inputs">
                            <label>Enter a password</label>
                            <input id="password" type="password" name="password" placeholder="Enter a strong password" required>
                            <i id="eye" class="fas fa-eye"></i>
                        </div>

                        <div class="image">
                            <label>Select a profile image</label>
                            <input type="file" name="image" required>
                        </div>

                        <div class="submit">
                            
                            <input type="submit" onClick="myFunction()" value="Start a chat"> 
                        </div>
                        
                     </form>


                     <div class="link">Already signed up? <a href="login.php">Login now</a></div>
        </section>
    </div>

    <script src="./javascript/showPassword.js"></script>
    <script src="./javascript/signup.js"></script>
    
</body>
</html>