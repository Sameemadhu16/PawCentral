document.addEventListener('DOMContentLoaded', function() {
    const isServiceYes = document.getElementById('isService-yes');
    const isServiceNo = document.getElementById('isService-no');
    const signupButton = document.getElementById('signup-button');
    const nextButton = document.getElementById('next-button');
    const form=document.querySelector('form');

    const originalButton = signupButton.style.display;

    function updateButtonText() {
        if (isServiceYes.checked) {
            nextButton.style.display = 'block';
            signupButton.style.display='none';
        } else {
            signupButton.style.display = 'block';
            nextButton.style.display='none';
        }
    }

    isServiceYes.addEventListener('change', updateButtonText);
    isServiceNo.addEventListener('change', updateButtonText);
});