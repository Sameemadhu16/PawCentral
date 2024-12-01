function selectPet(element) {
    document.querySelectorAll(".pet-pill").forEach(pill => {
        pill.classList.remove('selected');
    });
    element.classList.add('selected');
}