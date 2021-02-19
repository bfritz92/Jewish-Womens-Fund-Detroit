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