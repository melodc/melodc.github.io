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

function validateForm() {
  var name = document.forms["form"]["name"].value;
  var email = document.forms["form"]["email"].value;
  var message = document.forms["form"]["message"].value;

  if (name === "" || email === "" || message === "") {
    return false;
  }

  let form = document.getElementsByClassName('form-group')[0];
  if (form.contains(document.querySelector('.final-message'))) {
    form.removeChild(document.querySelector('.final-message')) 
  }
  let newDiv = document.createElement('div');
  newDiv.className = 'final-message';
  let p = document.createElement('p');
  p.textContent = 'Thank you for reaching out to me. I will get back to you as soon as possible.'
  newDiv.appendChild(p);

  let button = document.querySelector('button').parentElement;
  form.insertBefore(newDiv, button);
  form.reset();

  return false;
}

