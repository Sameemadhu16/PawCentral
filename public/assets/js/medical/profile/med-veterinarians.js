document.addEventListener('DOMContentLoaded', () => {
    loadVeterinarians();

    document.getElementById('vetForm').addEventListener('submit', function(event) {
        event.preventDefault();
        saveVeterinarian();
    });
});

function loadVeterinarians() {
    // Fetch veterinarians from the server (this is a placeholder)
    const veterinarians = [
        { id: 1, name: 'Dr. John Doe', degree: 'DVM', email: 'john@example.com' },
        { id: 2, name: 'Dr. Jane Smith', degree: 'DVM', email: 'jane@example.com' }
    ];

    const vetList = document.querySelector('.vet-list');
    vetList.innerHTML = '';

    veterinarians.forEach(vet => {
        const vetItem = document.createElement('div');
        vetItem.classList.add('vet-item');
        vetItem.innerHTML = `
            <div class="vet-info">
                <p><strong>${vet.name}</strong></p>
                <p>${vet.degree}</p>
                <p>${vet.email}</p>
            </div>
            <div class="vet-actions">
                <button onclick="editVeterinarian(${vet.id})">Edit</button>
                <button onclick="deleteVeterinarian(${vet.id})">Delete</button>
            </div>
        `;
        vetList.appendChild(vetItem);
    });
}

function showAddVetForm() {
    document.getElementById('formTitle').innerText = 'Add Veterinarian';
    document.getElementById('vetForm').reset();
    document.getElementById('vetId').value = '';
    document.getElementById('vetFormModal').style.display = 'flex';
}

function closeVetForm() {
    document.getElementById('vetFormModal').style.display = 'none';
}

function saveVeterinarian() {
    const id = document.getElementById('vetId').value;
    const name = document.getElementById('vetName').value;
    const degree = document.getElementById('vetDegree').value;
    const email = document.getElementById('vetEmail').value;

    if (id) {
        // Update veterinarian (this is a placeholder)
        console.log(`Updating veterinarian ${id}: ${name}, ${degree}, ${email}`);
    } else {
        // Add new veterinarian (this is a placeholder)
        console.log(`Adding new veterinarian: ${name}, ${degree}, ${email}`);
    }

    closeVetForm();
    loadVeterinarians();
}

function editVeterinarian(id) {
    // Fetch veterinarian data from the server (this is a placeholder)
    const veterinarian = { id: id, name: 'Dr. John Doe', degree: 'DVM', email: 'john@example.com' };

    document.getElementById('formTitle').innerText = 'Edit Veterinarian';
    document.getElementById('vetId').value = veterinarian.id;
    document.getElementById('vetName').value = veterinarian.name;
    document.getElementById('vetDegree').value = veterinarian.degree;
    document.getElementById('vetEmail').value = veterinarian.email;
    document.getElementById('vetFormModal').style.display = 'flex';
}

function deleteVeterinarian(id) {
    // Delete veterinarian (this is a placeholder)
    console.log(`Deleting veterinarian ${id}`);
    loadVeterinarians();
}