document.getElementById('scroll').addEventListener('click', function() {
  document.querySelector('.projects').scrollIntoView({ 
  behavior: 'smooth' 
});
});


document.getElementById('projects-link').addEventListener('click', function() {
  document.querySelector('.projects').scrollIntoView({ 
  behavior: 'smooth' 
});
});

document.getElementById('contact-link').addEventListener('click', function() {
  document.querySelector('.form').scrollIntoView({ 
  behavior: 'smooth' 
});
});

var element = document.getElementById("counter");
  element.classList.remove(" badge-done0");