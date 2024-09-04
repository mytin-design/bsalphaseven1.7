function showResults() {
    ul.classList.remove("hidden");
}

let ul = document.getElementById('myUl');


function myFunction() {
    //Declare variables
    var input, filter, li, a, i, txtValue;

    input = document.getElementById('vn_src');
    filter = input.value.toUpperCase();
    li = ul.getElementsByTagName('li');

 //cHECK IF THE INPUT IS EMPTY
 if(filter.trim() === "") {
    ul.style.display = "none";
    return;
}else {
    ul.style.display = ""
}
   
    //loop through all list items, and hide those who don't match the search query

    for(i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;

        if(txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        }else {
            li[i].style.display = "none";
        }
    }
}



//header carousel 
let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("pcard");
    for(i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slideIndex++;
    if(slideIndex > slides.length) {
        slideIndex = 1;
    }
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 5000); //Change image every 2 seconds;

    let inds = document.getElementsByClassName("ind");

    for(i = 0; i < inds.length;i++) {
        inds[i].className = inds[i].className.replace("active", "");
    }

    slides[slideIndex-1].style.display = "block";
    inds[slideIndex-1].className += " active";
}


function plusSlides(n) {
    showSlides(slideIndex += n);
}