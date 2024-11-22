function openModal() {
    document.getElementById("deleteModal").style.display = "flex"; // Show the modal
}

function closeModal() {
    document.getElementById("deleteModal").style.display = "none"; // Hide the modal
}

function deleteItem() {
    // Perform the delete action (e.g., make an API call)
    alert('Item deleted!');
    closeModal(); // Close the modal after deletion
}
