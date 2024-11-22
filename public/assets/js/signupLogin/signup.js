
// JavaScript to dynamically change the button text
document.addEventListener('DOMContentLoaded', function() {
  const signupButton = document.getElementById('signup-button');
  const isServiceYes = document.getElementById('isService-yes');
  const isServiceNo = document.getElementById('isService-no');

  // Function to update button text
  function updateButtonText() {
    if (isServiceYes.checked) {
      signupButton.textContent = 'Next';
    } else {
      signupButton.textContent = 'Sign up';
    }
  }

  // Listen for changes on both radio buttons
  isServiceYes.addEventListener('change', updateButtonText);
  isServiceNo.addEventListener('change', updateButtonText);
});



//Function for dissapear error messages after 10 seconds
document.addEventListener('DOMContentLoaded', function() {
  const errorContainer = document.querySelector('.error-messages-container');

  if (errorContainer) {
    // Set a timeout to fade out and hide the error container after 10 seconds
    setTimeout(() => {
      errorContainer.classList.add('fade-out');

      // Remove the container from the DOM after the fade-out animation
      // completes
      setTimeout(() => {
        errorContainer.style.display = 'none';
      }, 1000);  // 1 second to match the fade-out duration
    }, 10000);   // 10 seconds delay
  }
});
