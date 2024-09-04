
settabbtns = document.getElementsByClassName("settlabel");


let openSettings = (evt, set) => {
    let t, s, setttabs;

    //get all tab contents, loop through and hide them
    setttabs = document.getElementsByClassName("settingstab");
    for(t=0;t<setttabs.length;t++) {
        setttabs[t].style.display = "none";
    }

    //get all buttons, loop through each and change the class of the current to active;

    for(s=0;s<settabbtns.length;s++) {
        settabbtns[s].className = settabbtns[s].className.replace("active", " ");
        settabbtns[s].style.background = ""; // Reset the background color for all buttons
    }


    //get tab content by id and display each when active class is targetted;

    document.getElementById(set).style.display = "flex";
    evt.currentTarget.classList.add("active");
        evt.currentTarget.style.background = "linear-gradient(90deg, rgba(238, 130, 238, 1) 0%, rgba(0, 209, 255, 1) 100%)";

    
    

}


document.getElementById("setbtnDefault").click();



document.getElementById('slideThree').addEventListener('change', function() {
    let c, r,u, q;
    var mainbody = document.getElementById('mainSettbody');
    let settlabel = document.querySelectorAll(".settlabel");
    let settboxin = document.querySelectorAll('.settboxin');
    let profpicsetbox = document.querySelector(".profpicsetbox");
    let editbox = document.querySelectorAll('.editbox');
    let editboxtitle = document.querySelectorAll('.editbox__title');
    let modalboxterms = document.querySelector('.modal-container');

    if (this.checked) {
        mainbody.style.backgroundColor = '#222';
        mainbody.style.color = "#fff";
        profpicsetbox.style.boxShadow = "15px 15px 30px #333";
        profpicsetbox.style.background = "#333";
        modalboxterms.style.backgroundColor = "#777";
        modalboxterms.style.color = "#fff";

        for(u=0;u<editbox.length;u++) {
            editbox[u].style.background = "#333";
            editbox[u].style.color = "#fff";
            editbox[u].style.borderColor = "#333";
            
        }

        for(q=0;q<editboxtitle.length;q++) {
            editboxtitle[q].style.color = "#fff";
        }

        for(c=0;c<settboxin.length;c++) {
            settboxin[c].style.backgroundColor = "#333";    
            settboxin[c].classList.remove("gray-bk");
        }
        for(r=0;r<settlabel.length;r++) {
            settlabel[r].style.backgroundColor = "transparent";
            settlabel[r].style.color = "#fff";
            settlabel[r].style.borderColor = "";
            settlabel[r].classList.remove("white-bk");
        }


    } else {
        mainbody.style.backgroundColor = '';
        mainbody.style.color = "#000";
        profpicsetbox.style.boxShadow = "15px 15px 30px #eee";
        profpicsetbox.style.background = "#e0e0e0";
        for(c=0;c<settboxin.length;c++) {
            settboxin[c].style.backgroundColor = "#eee";    
        }

       for(r=0;settlabel.length;r++) {
            settlabel[r].style.color = "#000";
            settlabel[r].style.backgroundColor = "";
       }

       for(u=0;u<editbox.length;u++) {
        editbox[u].style.background = "#eee";
        editbox[u].style.color = "#000";
        //editbox[u].style.borderColor = "#333";
          }


        for(q=0;q<editboxtitle.length;q++) {
            editboxtitle[q].style.color = "#000";
        }

    
    }
});


//open logout box
let card = document.querySelector(".card");
let ucard = document.querySelector(".usericonsett");


function openDsetbox() {
    
        card.style.display = "block";
        ucard.removeAttribute("onclick");
        ucard.setAttribute("onclick", "closeDsetbox()");
    
    
}function closeDsetbox() {
    card.style.display = "none";
    ucard.removeAttribute("onclick");
    ucard.setAttribute("onclick", "openDsetbox()");
}


//open name setter box
let nameeditbox = document.getElementById("editboxprofName");
let phoneeditbox = document.getElementById("editboxPhone");
let emaileditbox = document.getElementById("editboxEmail");
let gradeeditbox = document.getElementById("editboxGrade");
let streameditbox = document.getElementById("editboxStream");
let passeditbox = document.getElementById("editboxPass");


function opennameSet() {
    nameeditbox.style.display = "block";
    nameeditbox.style.transition = ".5s ease";
}

function closenameSet() {
    nameeditbox.style.display = "none";
    nameeditbox.style.transition = ".5s ease";

}


//phone
function openphoneSet() {
    phoneeditbox.style.display = "block";
    phoneeditbox.style.transition = ".5s ease";
}

function closephoneSet() {
    phoneeditbox.style.display = "none";
    phoneeditbox.style.transition = ".5s ease";

}

//email
function openemailSet() {
    emaileditbox.style.display = "block";
    emaileditbox.style.transition = ".5s ease";
}

function closeemailSet() {
    emaileditbox.style.display = "none";
    emaileditbox.style.transition = ".5s ease";

}

//grade
function opengradeSet() {
    gradeeditbox.style.display = "block";
    gradeeditbox.style.transition = ".5s ease";
}

function closegradeSet() {
    gradeeditbox.style.display = "none";
    gradeeditbox.style.transition = ".5s ease";

}

//stream
function openstreamSet() {
    streameditbox.style.display = "block";
    streameditbox.style.transition = ".5s ease";
}

function closestreamSet() {
    streameditbox.style.display = "none";
    streameditbox.style.transition = ".5s ease";

}

//pass
function openpassSet() {
    passeditbox.style.display = "block";
    passeditbox.style.transition = ".5s ease";
}

function closepassSet() {
    passeditbox.style.display = "none";
    passeditbox.style.transition = ".5s ease";

}

//open TERMS n Privacy
let setTermsbox = document.getElementById("setTermsbox");

function openTerms() {
    setTermsbox.style.display = "block";
}


function closeTerms() {
    setTermsbox.style.display = "none";

}
document.querySelector(".is-ghost").onclick = closeTerms;

//currently, the accept button has been set to close the box -
//add more functionality later
document.querySelector(".is-primary").onclick = closeTerms;


//DELETE ACCOUNT