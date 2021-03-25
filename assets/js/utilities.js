/* Sticky Nav */

window.addEventListener("load", () => {
 // Retrieve all help sections
 const sections = Array.from(document.querySelectorAll(".sticky-nav--item"));

 // Once a scrolling event is detected, iterate all elements
 // whose visibility changed and highlight their navigation entry
 const scrollHandler = entries =>
  entries.forEach(entry => {
   const section = entry.target;
   const sectionId = section.id;
   const sectionLink = document.querySelector(`a[href="#${sectionId}"]`);

   if (entry.intersectionRatio > 0.003) {
    section.classList.add("active");
    sectionLink.parentElement.classList.add("active");
    console.log(entry.intersectionRatio);
   } else {
    section.classList.remove("active");
    sectionLink.parentElement.classList.remove("active");
   }
  });

 // Creates a new scroll observer
 const observer = new IntersectionObserver(scrollHandler);

 //noinspection JSCheckFunctionSignatures
 sections.forEach(section => observer.observe(section));
});


/* Fade-in script */

const faders = document.querySelectorAll(".fade-in");
const sliders = document.querySelectorAll(".slide-in");

const appearOptions = {
  threshold: 0,
  rootMargin: "0px 0px -250px 0px"
};

const appearOnScroll = new IntersectionObserver(function(
  entries,
  appearOnScroll
) {
  entries.forEach(entry => {
    if (!entry.isIntersecting) {
      return;
    } else {
      entry.target.classList.add("appear");
      appearOnScroll.unobserve(entry.target);
    }
  });
},
appearOptions);

faders.forEach(fader => {
  appearOnScroll.observe(fader);
});

sliders.forEach(slider => {
  appearOnScroll.observe(slider);
});


// AJAX LOAD MORE STUFF
// Animation flag
var alm_is_animating = false; 
 
// Set initial active item
document.querySelector('.alm-filter-nav li:first-child').classList.add('active'); // Set initial active state
 
// Click Event
function filterClick(){
	
   // Get parent `<li/>`
   var parent = this.parentNode;   
   if(parent.classList.contains('active') && !alm_is_animating){ // Exit if active
	   return false;
   }   
   
   alm_is_animating = true; // Animation flag   
   
   var active = document.querySelector('.alm-filter-nav li.active'); // Get `.active` element
   if(active){
	   active.classList.remove('active');
   }	
	
	parent.classList.add('active'); // Add active class
   
   // Set filters 
	var transition = 'fade';
	var speed = 250;
	var data  = this.dataset;
	
	// Call core Ajax Load More `filter` function
	ajaxloadmore.filter(transition, speed, data);
}
 
// Event Handlers
var filter_buttons = document.querySelectorAll('.alm-filter-nav li a');
if(filter_buttons){
	[].forEach.call(filter_buttons, function(button) {
		button.addEventListener('click', filterClick);
	});
}
 
// Callback
window.almFilterComplete = function(){      
   alm_is_animating = false; // Clear animation flag
};