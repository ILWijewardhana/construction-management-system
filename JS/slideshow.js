var i = 0;
var images = [];
var time = 4000;

//image list
images[0] = '../images/home1.jpeg';
images[1] = '../images/home2.jpeg';
images[2] = '../images/home3.jpeg';
images[3] = '../images/home4.jpeg';
images[4] = '../images/home5.jpeg';
images[5] = '../images/home6.jpeg';

//change image
function changeImg(){
    document.getElementById("slide").src = images[i];
    if(i < images.length - 1){
        i++;
    }
    else{
        i = 0;
    }
    setTimeout("changeImg()", time);
}