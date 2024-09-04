
//for sidepanel 

//open the sidepanel by setting the width to 25pc

let openNav = () => {
    document.getElementById("sidePanel").style.width = "15pc";
}


//close the panel by changing width to 0

let closeNav = () => {
    document.getElementById("sidePanel").style.width = "0";
}




//pop up dialog box
//ts check

let dbox = document.querySelector(".dialogmain");
let body = document.querySelector("body");
let closeDialog = () => {
    //get buttons and dialog box
    let b1 = document.getElementById("b1");
    let b2 = document.getElementById("b2");

    dbox.style.display = "none";

    //should effect when dialog box is not active
    body.classList.remove("addopacity");
    dbox.classList.remove("removeopacity");

}

let openDialog = () => {
    dbox.style.display = "block";

    //should effect when dialog box is active
    body.classList.add("addopacity");
    dbox.classList.add("removeopacity");
}











//Employee joining form



function openJoinerForm(){
    document.getElementById("joinerHolder").style.display = "block";
}


function closeJoinerForm() {
    document.getElementById("joinerHolder").style.display = "none";
}



//Registration notification
function cannotRegister() {
    alert('Kindly visit the ICT department or your senior teacher.')
}



//Search close box button

let closeSearcher = () => {
    document.getElementById("myUl").style.display = "none";
}



       //When the user scrolls doqwn 20px from the top of the document, slide down the navbar
//When the user scrolls to the top of the page, slide up the navbar out of the top view

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById('scrollDesc').style.top = "0";
    } else {
        document.getElementById('scrollDesc').style.top = "-70px";
    }
}