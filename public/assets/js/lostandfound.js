const pets = [
    { name: 'Nikkey', breed: 'Pomeranian', status: 'Found', image: './assets/images/pets/petres1.jpg', address: '36/2 Sri Lankarama Rd - Panadura', date: '2024/05/16' },
    { name: 'Tiny', breed: 'German Shepherd', status: 'Found', image: './assets/images/pets/pet1.jpg', address: '221B Baker St - Colombo', date: '2024/05/16' },
    { name: 'Tibaerius', breed: 'Labrador', status: 'Lost', image: './assets/images/pets/lost_2.png', address: '45 Queens Rd - Kandy', date: '2024/05/16' },
    { name: 'Nikkey', breed: 'Pomeranian', status: 'Found', image: './assets/images/pets/lost_1.png', address: '10 Downing St - Galle', date: '2024/05/16' },
    { name: 'Tinsy', breed: 'German Shepherd', status: 'Found', image: './assets/images/pets/found_1.png', address: '15 Temple Rd - Negombo', date: '2024/05/16' },
    { name: 'Tiberius', breed: 'Labrador', status: 'Lost', image: './assets/images/pets/petres1.jpg', address: '36/2 Sri Lankarama Rd - Panadura', date: '2024/05/16' },
    { name: 'Nikkddey', breed: 'Pomeranian', status: 'Found', image: './assets/images/pets/pet1.jpg', address: '221B Baker St - Colombo', date: '2024/05/16' },
    { name: 'Tinsay', breed: 'German Shepherd', status: 'Found', image: './assets/images/pets/lost_2.png', address: '45 Queens Rd - Kandy', date: '2024/05/16' },
    { name: 'Tiberius', breed: 'Labrador', status: 'Lost', image: './assets/images/pets/lost_1.png', address: '10 Downing St - Galle', date: '2024/05/16' },
    { name: 'Nikkey', breed: 'Pomeranian', status: 'Found', image: './assets/images/pets/found_1.png', address: '15 Temple Rd - Negombo', date: '2024/05/16' },
    { name: 'Tiny', breed: 'German Shepherd', status: 'Found', image: './assets/images/pets/petres1.jpg', address: '36/2 Sri Lankarama Rd - Panadura', date: '2024/05/16' },
    { name: 'Tiberius', breed: 'Labrador', status: 'Lost', image: './assets/images/pets/pet1.jpg', address: '221B Baker St - Colombo', date: '2024/05/16' },
    { name: 'Nikkey', breed: 'Pomeranian', status: 'Found', image: './assets/images/pets/lost_2.png', address: '45 Queens Rd - Kandy', date: '2024/05/16' },
    { name: 'Tiny', breed: 'German Shepherd', status: 'Found', image: './assets/images/pets/lost_1.png', address: '10 Downing St - Galle', date: '2024/05/16' },
    { name: 'Tiberius', breed: 'Labrador', status: 'Lost', image: './assets/images/pets/found_1.png', address: '15 Temple Rd - Negombo', date: '2024/05/16' }
];

const petsPerPage = 9;
let currentPage = 1;
let filteredPets = [...pets];

const petList = document.getElementById('petList');
const filterButtons = document.querySelectorAll('.filter-btn');
const prevPageBtn = document.getElementById('prevPage');
const nextPageBtn = document.getElementById('nextPage');
const currentPageSpan = document.getElementById('currentPage');

function displayPets() {
    const startIndex = (currentPage - 1) * petsPerPage;
    const endIndex = startIndex + petsPerPage;
    const petsToDisplay = filteredPets.slice(startIndex, endIndex);

    petList.innerHTML = '';
    petsToDisplay.forEach(pet => {
        const petCard = document.createElement('a');
        // petCard.classList.add('pet-card');
        petCard.classList.add('pet-card', 'pet-card-link'); // Add both 'pet-card' and 'pet-card-link' classes
        petCard.href = `lostandfound/idoflost`; // Set the link to the respective pet's page

        // petCard.innerHTML = `
        //     <h3>${pet.name} - ${pet.breed}</h3>
        //     <p>Status: ${pet.status}</p>
        //     <p>Address: ${pet.address}</p>
        //     <p>Date: ${pet.date}</p>
        // `;

        petCard.innerHTML = `
        <img src='${pet.image}' alt="Nikkey" class="pet-image">
        <div class="pet-info">
            <h2>${pet.name} - ${pet.breed}</h2>
            <p>${pet.status}</p>
            <p>${pet.address}</p>
            <p>reported on: ${pet.date}</p>
        </div>
        `;

        petList.appendChild(petCard);
    });

    updatePagination();
}

function updatePagination() {
    const totalPages = Math.ceil(filteredPets.length / petsPerPage);
    currentPageSpan.textContent = currentPage;
    prevPageBtn.disabled = currentPage === 1;
    nextPageBtn.disabled = currentPage === totalPages;
}

function filterPets(status) {
    if (status === 'all') {
        filteredPets = [...pets];
    } else {
        filteredPets = pets.filter(pet => pet.status.toLowerCase() === status);
    }
    currentPage = 1;
    displayPets();
}

filterButtons.forEach(button => {
    button.addEventListener('click', () => {
        filterButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');
        filterPets(button.dataset.filter);
    });
});

prevPageBtn.addEventListener('click', () => {
    if (currentPage > 1) {
        currentPage--;
        displayPets();
    }
});

nextPageBtn.addEventListener('click', () => {
    const totalPages = Math.ceil(filteredPets.length / petsPerPage);
    if (currentPage < totalPages) {
        currentPage++;
        displayPets();
    }
});

// Initial display
displayPets();