//STUDENTS ASSIGNMENT TABS
//Show available and uploaded assignments;

//Side nav for learner dashboard
let openStuder = () => {
    document.getElementById("studSideNav").style.width = "15pc";
}

let closeStuder = () => {
    document.getElementById("studSideNav").style.width = "0";
}


//end if


function openstdAsstab(event, std) {
    //declare variables

    let r, w, stdassbtns, stdasstabs;

    //get all tabs, loop through them and hide them 

    stdasstabs = document.getElementsByClassName("stdasstabcont");
    for(r = 0;r < stdasstabs.length;r++){
        stdasstabs[r].style.display = "none";
    }


    //get all buttons and change active status when clicked

    stdassbtns = document.getElementsByClassName("stdstaassbtn");
    for(u = 0;u < stdassbtns.length;u++) {
        stdassbtns[u].className = stdassbtns[u].className.replace("active", " ");
    }

    //display the current selected tab
    document.getElementById(std).style.display = "block";

    event.currentTarget.classList.add("active");
}

//display the tab whose button's ID is specified 
document.getElementById("stdasstabBtn").click();




//REGISTERED AND REGISTRATION TABS

function openregSubj(eve, reg) {
    //declare variables

    let q, v, stdregbtns, stdregtabs;

    //get all tabs, loop through them and hide them 

    stdregtabs = document.getElementsByClassName("regtab");
    for(q = 0;q < stdregtabs.length;q++){
        stdregtabs[q].style.display = "none";
    }


    //get all buttons and change active status when clicked

    stdregbtns = document.getElementsByClassName("regsubjbtn");
    for(v = 0;v < stdregbtns.length;v++) {
        stdregbtns[v].className = stdregbtns[v].className.replace("active", " ");
    }

    //display the current selected tab
    document.getElementById(reg).style.display = "block";

    eve.currentTarget.classList.add("active");
}

//display the tab whose button's ID is specified 
document.getElementById("regsubjbtnmain").click();



