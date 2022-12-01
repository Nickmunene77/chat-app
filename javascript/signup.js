const form =document.querySelector(".nick-signup form"), //you can use a comma to decarare many variables
errorText = document.querySelector(".mistake-text");

 
form.onsubmit = (e)=>{
    e.preventDefault();  //prevents the form from submiting when a submit is clicked
}

function myFunction(){
    // working with ajax
    let xhr =new XMLHttpRequest(); // this creates xml object
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = () =>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response;  //returrs the response body
        
            if (data == 'success'){
                location.href = "user.php";

            }else{
                
                errorText.textContent = data;
                errorText.style.display ="block";
            }
        }
    }


    }

    //send for data through ajax to php
    let formData= new FormData(form);  //creatin a new object formData

    xhr.send(formData); //sending formData to the php
}
