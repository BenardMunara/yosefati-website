// JavaScript Document

var slideIndex=0;
 showSlides(slideIndex);
 //next && prev
function nextSlide(n){
    clearTimeout(slideTime);
  showSlides(slideIndex+=n); 
  clearTimeout(slideTime);
  console.log(slideTime)
}

var slideTime;
function showSlides(){
  var i;
  var slides = document.getElementsByClassName("sliderItems"); 
  for(i = 0;i<slides.length;i++){
    slides[i].style.display = "none";
  }
  slideIndex++;
  if(slideIndex>slides.length){
  
    slideIndex = 1;     
  } 
    slides[slideIndex-1].style.display = "block"; 
   slideTime =  setTimeout(showSlides, 7000);  
   if(slideTime>=6){
    clearTimeout(slideTime);
    slideTime = setTimeout(showSlides, 15000);
   }
}
 