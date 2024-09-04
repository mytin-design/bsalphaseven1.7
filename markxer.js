//Slide carousel manual 

let slideexCounter = 1;
displayexSldes();


//btns

function pushSlide(q) {
    displayexSldes(slideexCounter += q);
}



function displayexSldes(q) {
    let e, slideexHolders;


    slideexHolders = document.getElementsByClassName("slideexholder");

    for(e = 0;e < slideexHolders.length;e++) {
        slideexHolders[e].style.display = 'none';
    }


    if(q > slideexHolders.length) {
        slideexCounter = slideexHolders.length;
    }

    if(q < 1) {
        slideexCounter = 1;
    }

    slideexHolders[slideexCounter-1].style.display = "block";
}


