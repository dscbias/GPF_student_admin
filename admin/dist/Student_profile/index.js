function myFunction(){
  var button1= document.getElementById("toggle");
    if(button1.innerHTML === "Active"){
      button1.innerHTML="Inactive";
    }
    else{
      button1.innerHTML="Active";
    }

}
function myFunction1(){
  var button2= document.getElementById("toggle1");
    if(button2.innerHTML === "Student"){
      button2.innerHTML="Member";
    }
    else if(button2.innerHTML === "Member"){
      button2.innerHTML="Intern";
    }
  else{
    button2.innerHTML = "Student";
  }
}
