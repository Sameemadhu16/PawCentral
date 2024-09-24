const events = [
    { title: 'Animal sterilization camp', date: 'Sun, 5th September, 4:00 PM', location: '@youth club', address: '36/2 Sri lankarama rd -panadura', publishedDate: '2024/05/16', image: './assets/images/pets/found_1.png' },
    { title: 'Pet adoption day', date: 'Sat, 11th September, 10:00 AM', location: '@city park', address: '45 Park Avenue, Colombo', publishedDate: '2024/05/18', image: './assets/images/pets/found_1.png' },
    { title: 'Veterinary check-up camp', date: 'Sun, 19th September, 9:00 AM', location: '@community center', address: '22 Main Street, Kandy', publishedDate: '2024/05/20', image: './assets/images/pets/petres_2.png' },
    { title: 'Pet grooming workshop', date: 'Sat, 25th September, 2:00 PM', location: '@pet store', address: '15 Beach Road, Galle', publishedDate: '2024/05/22', image: './assets/images/pets/petres_3.png' },
    { title: 'Animal welfare seminar', date: 'Sun, 3rd October, 11:00 AM', location: '@university hall', address: '100 University Drive, Peradeniya', publishedDate: '2024/05/24', image: './assets/images/pets/found_1.png' },
    { title: 'Fundraising gala for animal shelter', date: 'Sat, 9th October, 7:00 PM', location: '@grand hotel', address: '55 Galle Face, Colombo', publishedDate: '2024/05/26', image: './assets/images/pets/found_1.png' },
    { title: 'Veterinary check-up camp', date: 'Sun, 19th September, 9:00 AM', location: '@community center', address: '22 Main Street, Kandy', publishedDate: '2024/05/20', image: './assets/images/pets/petres_2.png' },
    { title: 'Pet grooming workshop', date: 'Sat, 25th September, 2:00 PM', location: '@pet store', address: '15 Beach Road, Galle', publishedDate: '2024/05/22', image: './assets/images/pets/petres_3.png' },
];

const eventsPerPage = 6;
let currentPage = 1;

const eventList = document.getElementById('eventList');
const prevPageBtn = document.getElementById('prevPage');
const nextPageBtn = document.getElementById('nextPage');
const currentPageSpan = document.getElementById('currentPage');

function displayEvents() {
    const startIndex = (currentPage - 1) * eventsPerPage;
    const endIndex = startIndex + eventsPerPage;
    const eventsToDisplay = events.slice(startIndex, endIndex);

    eventList.innerHTML = '';
    eventsToDisplay.forEach(event => {
        const eventCard = document.createElement('div');
        eventCard.classList.add('event-card');

        eventCard.innerHTML = `
            <div class="event-card-content">
              <img src="${event.image}" alt="Animal Event" class="event-image">
              <div class="event-details">
                <h2>${event.title}</h2>
                <p>${event.date}</p>
                <p>${event.location}</p>
                <p>${event.address}</p>
                <p class="published-date">published on: ${event.publishedDate}</p>
              </div>
              <div class="event-actions">
                <button class="find-more-btn">Find more</button>
                <button class="enroll-btn">Enroll</button>
              </div>
            </div>`;
            
        eventList.appendChild(eventCard);
    });

    updatePagination();
}

function updatePagination() {
    const totalPages = Math.ceil(events.length / eventsPerPage);
    currentPageSpan.textContent = currentPage;
    prevPageBtn.disabled = currentPage === 1;
    nextPageBtn.disabled = currentPage === totalPages;
}

prevPageBtn.addEventListener('click', () => {
    if (currentPage > 1) {
        currentPage--;
        displayEvents();
    }
});

nextPageBtn.addEventListener('click', () => {
    const totalPages = Math.ceil(events.length / eventsPerPage);
    if (currentPage < totalPages) {
        currentPage++;
        displayEvents();
    }
});

// Placeholder functions for button actions
function findMore(eventTitle) {
    console.log(`Find more about: ${eventTitle}`);
    // Implement navigation to event details page
}

function enroll(eventTitle) {
    console.log(`Enroll in: ${eventTitle}`);
    // Implement enrollment functionality
}

// Initial display
displayEvents();

// Publish event button action (placeholder)
document.getElementById('publishEvent').addEventListener('click', () => {
    console.log('Publish new event');
    // Implement navigation to event creation page or open a modal
});