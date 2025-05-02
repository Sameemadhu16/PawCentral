function selectVet(element) {
    document.querySelectorAll(".vet-pill").forEach(pill => {
        pill.classList.remove('selected');
    });
    element.classList.add('selected');
}

document.addEventListener('DOMContentLoaded', () => {
    
    // Add event listener to the next button to validate selection and submit the form
    const nextButton = document.getElementById('next-button');
    const appointmentForm = document.getElementById('appointment-vet-form');
    const vetInput = document.getElementById('vet-input');
    
    if (nextButton && appointmentForm) {
        nextButton.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent the default behavior
            
            const selectedVet = document.querySelector('.vet-pill.selected');

            
            if (!selectedVet) {
                alert('Please select a veterinarian for your appointment');
                return;
            }

            //get data-vet-id attribute from selected vet
            const vetId = selectedVet.getAttribute('data-vet-id');
            //set values to hidden input field
            vetInput.value = vetId;
            // Submit the form
            appointmentForm.submit();
        });
    }
});