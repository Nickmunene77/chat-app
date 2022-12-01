const searchBar= document.getElementById("searchNames"),
searchBtn = document.getElementById("searchBtn"),
userList = document.querySelector(".users .user-lists");

//code to show the search bar
searchBtn.onclick =()=>{
    searchBar.classList.toggle("active");
    searchBar.focus(); //makes a search bar strat clicking |
    searchBtn.classList.toggle("active"); //works with css

    searchBar.value="";  //makes search bar empty aftter completing a search
    
}

searchBar.onkeyup =()=>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add("active"); //we are adding an active class for a user
    }else{
        searchBar.classList.remove("active");

    }
      // working with ajax
      let xhr =new XMLHttpRequest(); // this creates xml object
      xhr.open("POST", "php/search.php", true);
      xhr.onload = () =>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;  //returrs the response body
              userList.innerHTML = data;
          
             
          }
      }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);

}


setInterval(()=>{

    // working with ajax
    let xhr =new XMLHttpRequest(); // this creates xml object
    xhr.open("GET", "php/user.php", true);
    xhr.onload = () =>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response;  //returrs the response body
        
            if(!searchBar.classList.contains ("active")){
                userList.innerHTML = data;
            }   
        }
    }
}
xhr.send();
}, 500); // this function will run after 500ms
