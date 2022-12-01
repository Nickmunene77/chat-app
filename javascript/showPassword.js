const passwordField =document.getElementById("password"),
toggleBtn=document.getElementById("eye")


//code to show password
toggleBtn.onclick=()=>{
    if(passwordField.type=="password"){
        passwordField.type ="text";
        
      }
      else{
        passwordField.type="password";
      }
}

