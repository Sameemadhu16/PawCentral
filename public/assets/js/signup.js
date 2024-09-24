document.addEventListener('DOMContentLoaded', function() {
    const isServiceYes = document.getElementById('isService-yes');
    const isServiceNo = document.getElementById('isService-no');
    const signupButton = document.getElementById('signup-button');

    const originalButtonText = signupButton.textContent;

    function updateButtonText() {
        if (isServiceYes.checked) {
            signupButton.textContent = 'NEXT';
        } else {
            signupButton.textContent = originalButtonText;
        }
    }

    isServiceYes.addEventListener('change', updateButtonText);
    isServiceNo.addEventListener('change', updateButtonText);
});