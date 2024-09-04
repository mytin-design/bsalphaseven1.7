//Viewmarks sidenav 

function closeviewNav() {
    const sideviewnav = document.querySelector("#sideviewnav");
    const sectionview = document.querySelector(".sectionview");
    const btnandtitle = document.querySelector(".btnandtitle");

    sideviewnav.style.width = "0";
    btnandtitle.style.width = "10pc";

    if (window.innerWidth < 600) {
        sectionview.style.marginLeft = "0";
    } else {
        sectionview.style.marginLeft = "10pc";
    }
}

// Add an event listener to handle window resize
window.addEventListener('resize', function() {
    const sectionview = document.querySelector(".sectionview");
    if (window.innerWidth < 600) {
        sectionview.style.marginLeft = "0";
    } else {
        sectionview.style.marginLeft = "10pc";
    }
});



function openviewNav() {
    const sideviewnav = document.querySelector("#sideviewnav");
    const sectionview = document.querySelector(".sectionview");
    const btnandtitle = document.querySelector(".btnandtitle");

    sideviewnav.style.width = "15pc";
    btnandtitle.style.width = "19pc";

    if (window.innerWidth < 600) {
        sectionview.style.marginLeft = "0";
    } else {
        sectionview.style.marginLeft = "15pc";
    }
}

// Add an event listener to handle window resize
window.addEventListener('resize', function() {
    const sectionview = document.querySelector(".sectionview");
    if (window.innerWidth < 600) {
        sectionview.style.marginLeft = "0";
    } else {
        sectionview.style.marginLeft = "15pc";
    }
});





let accordion = document.getElementsByClassName("accordionbtn");

let x;

//for each of the accordion buttons
for(x=0;x < accordion.length;x++) {

    //listen for a click
    accordion[x].addEventListener('click', function(){
        //Toggle between adding and removing the "active" class.
        //to highlight the button that controls the panel 
        this.classList.toggle('active');
//Toggle between hiding and showing the active panel

let panel = this.nextElementSibling;
if(panel.style.display === "block") {
    panel.style.display = "none";
}else {
    panel.style.display = "block";
}


if(panel.style.maxHeight) {
    panel.style.maxHeight = null;
}else {
    panel.style.maxHeight = panel.scrollHeight + "px";
}

    });


}

