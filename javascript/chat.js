const form = document.querySelector('.typing-area'),
inputField = form.querySelector(".chat-message"),
sendButton = form.querySelector("button"),
chatBox =  document.querySelector(".chat-box")


form.onsubmit = (e)=>{
    e.preventDefault();  //prevents the form from submiting when a submit is clicked
}


sendButton.onclick = () => {
    
    // working with ajax
    let xhr =new XMLHttpRequest(); // this creates xml object
    xhr.open("POST", "php/insert_chat.php", true);
    xhr.onload = () =>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            inputField.value = "";  //this leaves the input field empty after sending the message

                scrollBottom();
           
        }
    }


    }

    //send for data through ajax to php
    let formData= new FormData(form);  //creatin a new object formData

    xhr.send(formData); //sending formData to the php
}
//this will stop the scrolll down when user scrolls up  MUST BE INCLUDED TO SCROLL UP
chatBox.onmouseenter =()=>{
    chatBox.classList.add("active");
}
chatBox.onmouseleave =()=>{
    chatBox.classList.remove("active");
}

setInterval(()=>{

    // working with ajax
    let xhr =new XMLHttpRequest(); // this creates xml object
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = () =>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response;  //returrs the response body
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){  //if 
                scrollBottom();
            }             
        }
    }
}
// we have to send form data using ajax to php
let formData = new FormData(form); //we are creating a new form object here
xhr.send(formData); // sending form data to php
}, 500); // this function will run after 500ms


//function for the chat to start from down automaticallybwithout scrolling
function scrollBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}
