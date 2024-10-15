// Add event listener to all select elements with the class "action-select"
document.querySelectorAll('.action-select').forEach(function(selectElement) {
    // Set the default value to "approve" and apply the green border
    selectElement.value = 'approve';
    selectElement.style.borderColor = 'green';

    selectElement.addEventListener('change', function() {
        // Reset the border color
        selectElement.style.borderColor = '#ced4da';

        // Change the border color based on the selected value
        if (selectElement.value === 'approve') {
            selectElement.style.borderColor = 'green';
        } else if (selectElement.value === 'reject') {
            selectElement.style.borderColor = 'red';
        }
    });
});