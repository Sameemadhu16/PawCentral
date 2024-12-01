function validateForm(event) {
    let isValid = true;

    // Get form inputs
    const form = document.getElementById('postpetform');
    const tradeType = form.querySelector('input[name="tradeType"]');
    const petName = form.querySelector('input[name="petName"]');
    const species = form.querySelector('input[name="species"]');
    const breed = form.querySelector('input[name="breed"]');
    const genderNeeds = form.querySelector('input[name="genderNeeds"]');
    const contactName = form.querySelector('input[name="contactName"]');
    const contactNumber = form.querySelector('input[name="contactNumber"]');
    const email = form.querySelector('input[name="email"]');

    // Clear previous error messages
    form.querySelectorAll('.error').forEach(error => error.remove());

    // Validation logic
    isValid = validateField(tradeType, 'Trade type is required.') && isValid;
    isValid = validateField(petName, 'Pet name is required.') && isValid;
    isValid = validateField(species, 'Species is required.') && isValid;
    isValid = validateField(breed, 'Breed is required.') && isValid;
    isValid = validateField(genderNeeds, 'Gender/Special needs are required.') && isValid;

    isValid = validateField(
        contactName,
        'Contact name is required.'
    ) && isValid;

    isValid = validateField(
        contactNumber,
        'Please enter a valid contact number.',
        /^\+?[0-9]{10,14}$/
    ) && isValid;

    isValid = validateField(
        email,
        'Please enter a valid email address.',
        /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/
    ) && isValid;

    // Prevent form submission if invalid
    if (!isValid) {
        event.preventDefault();
    }
}

// Helper function to validate a single field
function validateField(input, errorMessage, regex = null) {
    const value = input.value.trim();
    const isValid = regex ? regex.test(value) : value !== '';

    if (!isValid) {
        showError(input, errorMessage);
    }

    return isValid;
}

// Function to show error message
function showError(input, message) {
    const errorElement = document.createElement('p');
    errorElement.className = 'error';
    errorElement.textContent = message;

    // Position the error message after the input field
    input.parentNode.insertBefore(errorElement, input.nextSibling);
}