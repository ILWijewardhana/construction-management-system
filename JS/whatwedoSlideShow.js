//what we do page slide show
var i = 0;
var images = [];
var time = 4000;

//image list
images[0] = '../images/project1.png';
images[1] = '../images/project2.jpg';
images[2] = '../images/project3.jpg';
images[3] = '../images/project4.jpg';
images[4] = '../images/project5.jpg';
images[5] = '../images/project6.jpg';
images[6] = '../images/project7.jpeg';
images[7] = '../images/project8.jpeg';
images[8] = '../images/project9.jpeg';
images[9] = '../images/project10.jpeg';

//change image
function changeImg(){
    document.getElementById("slide2").src = images[i];
    if(i < images.length - 1){
        i++;
    }
    else{
        i = 0;
    }
    setTimeout("changeImg()", time);
}
//reference "https://www.w3schools.com/"