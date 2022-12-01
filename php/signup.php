<?php

session_start(); // as we used session we should start it

include_once "configure.php"; //it includes the specified file during script exection
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$eml = mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($fname) && !empty($lname) && !empty($eml) && !empty($pass)){

    //LET CHECK IF USER EAMIL IS VALID    VALIDATION
    if(filter_var($eml, FILTER_VALIDATE_EMAIL)){  //WHEN EMAIL IS VALID 

        //checking if the email already exists in the database
        $sql = mysqli_query($conn, "SELECT  email FROM users WHERE email ='{$eml}'");
        if(mysqli_num_rows($sql) > 0){
            echo "$eml - already existing!";

        }else{
            //cheching if a user uploade a file or not  isset checjs if variable is not null
            if(isset($_FILES['image'])){ // if file is uploaded

                $img_name = $_FILES['image']['name']; //getting users uploaded image name
                $tmp_name = $_FILES['image']['tmp_name']; // this is used to save or move our file in our folder

                //explode image to get the last name like jpg
                $img_explode = explode('.', $img_name);
                $img_extension = end($img_explode); // extension of an user image i.e jpeg, jpg...

                $extensions = ['png', 'jpg', 'jpeg'];  //the valid extensions
                if(in_array($img_extension, $extensions)=== true){  //if it matches the extensions in the array
                    $time = time(); //this capture the time of image upload, we will rename user image with the current time
                                   // this wiil make all image fileasn have a unique name
                                   
                //move our user selected image file to our folder in htdocs
                $new_img_name = $time.$img_name;
               if(move_uploaded_file($tmp_name, "images/".$new_img_name)){  //if the uploaded image move to our folder successfully

                    $status = "Active now" ;  // once user signed in their status will read active now  
                    $random_id = rand(time(), 10000000); //creating random id for users


                    //LET INSERT ALL USER DATA IN THE TABLE

                    $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, image, status)
                    VALUES ({$random_id}, '{$fname}' , '{$lname}', '{$eml}', '{$pass}', '{$new_img_name}', '{$status}')");

                    if($sql2){ // if the data is inserted
                        $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email ='{$eml}'");
                        if(mysqli_num_rows($sql3) > 0){
                            $row= mysqli_fetch_assoc($sql3); //fetches the next row
                            $_SESSION['unique_id'] = $row['unique_id']; // session will use the user unique id in the other php file
                            echo "success";

                        }


                    }else{
                        echo "Data was not inserted";
                    }
               }          

                
                }else{
                    echo "invalid image type";
                }

            }else{
                echo "Select an image";
            }
        }


    }else{
        echo " $eml - Invalid email";
    }

}else{
    echo "All inputs should be filled";
}
?>