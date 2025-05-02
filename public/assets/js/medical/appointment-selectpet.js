function selectPet(element) {
    document.querySelectorAll(".pet-pill").forEach(pill => {
        pill.classList.remove('selected');
    });
    element.classList.add('selected');
}

document.addEventListener('DOMContentLoaded', () => {
    
    // Add event listener to the next button to validate selection and submit the form
    const nextButton = document.getElementById('next-button');
    const appointmentForm = document.getElementById('appointment-pet-form');
    const petInput = document.getElementById('pet-input');
    
    if (nextButton && appointmentForm) {
        nextButton.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent the default behavior
            
            const selectedPet = document.querySelector('.pet-pill.selected');

            if (!selectedPet) {
                alert('Please select a Pet for your appointment');
                return;
            }

            //get data-pet-id attribute from selected pet
            const petId = selectedPet.getAttribute('data-pet-id');
            //set values to hidden input field
            petInput.value = petId;
            // Submit the form
            appointmentForm.submit();
        });
    }
});