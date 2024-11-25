function validateForm(event) {
    let isValid = true;

    // Get form inputs
    const tradeType = document.querySelector('input[name="tradeType"]');
    const petName = document.querySelector('input[name="petName"]');
    const species = document.querySelector('input[name="species"]');
    const breed = document.querySelector('input[name="breed"]');
    const genderNeeds = document.querySelector('input[name="genderNeeds"]');
    const contactName = document.querySelector('input[name="contactName"]');
    const contactNumber = document.querySelector('input[name="contactNumber"]');
    const email = document.querySelector('input[name="email"]');
    
    // Clear previous error messages
    const errorMessages = document.querySelectorAll('.error');
    errorMessages.forEach(error => error.remove());

    // Check if fields are empty
    if (!tradeType.value.trim()) {
        showError(tradeType, 'Trade type is required.');
        isValid = false;
    }

    if (!petName.value.trim()) {
        showError(petName, 'Pet name is required.');
        isValid = false;
    }

    if (!species.value.trim()) {
        showError(species, 'Species is required.');
        isValid = false;
    }

    if (!breed.value.trim()) {
        showError(breed, 'Breed is required.');
        isValid = false;
    }

    if (!genderNeeds.value.trim()) {
        showError(genderNeeds, 'Gender/Special needs are required.');
        isValid = false;
    }

    if (!contactName.value.trim()) {
        showError(contactName, 'Contact name is required.');
        isValid = false;
    }

    if (!contactNumber.value.trim() || !/^\+?[0-9]{10,14}$/.test(contactNumber.value.trim())) {
        showError(contactNumber, 'Please enter a valid contact number.');
        isValid = false;
    }

    if (!email.value.trim() || !/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email.value.trim())) {
        showError(email, 'Please enter a valid email address.');
        isValid = false;
    }

    // If form is invalid, prevent form submission
    if (!isValid) {
        event.preventDefault();
    }
}

// Function to show error message
function showError(input, message) {
    const errorElement = document.createElement('p');
    errorElement.classList.add('error');
    errorElement.textContent = message;
    input.insertAdjacentElement('afterend', errorElement);
}