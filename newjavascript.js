//the slideshow code uses this to determine a few things. Make sure this is set correctly!      
const NUMBER_OF_SLIDES = 3;

//get the width of the side-scrollable area in the 'sldieshow' div and divide by NUMBER_OF_SLIDES so that the 
//scrollLeft under setInterval knows by how much to scroll
var slide_width = document.getElementById('slideshow').scrollWidth / NUMBER_OF_SLIDES; 

//used as a reference for what slide to switch to in the coming setInterval()
var slide_number = 1; 