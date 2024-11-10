async function fetchCenterData() {
    // Replace with your actual API endpoint
    const response = await fetch('https://api.example.com/centers');
    return await response.json();
}

function createCard(center) {
    return `
        <div class="card">
            <img src="${center.imageUrl}" alt="${center.name}" class="card-image">
            <div class="card-content">
                <h2 class="card-title">${center.name}</h2>
                <p class="card-subtitle">${center.location}</p>
                <button class="card-button" onclick="bookAppointment('${center.id}')">Book appointment</button>
            </div>
        </div>
    `;
}

function bookAppointment(centerId) {
    console.log(`Booking appointment for center ${centerId}`);
    // Implement your booking logic here
}

async function displayCards() {
    const cardGrid = document.getElementById('cardGrid');
    try {
        const centers = await fetchCenterData();
        centers.forEach(center => {
            const cardHtml = createCard(center);
            cardGrid.innerHTML += cardHtml;
        });
    } catch (error) {
        console.error('Error fetching center data:', error);
        cardGrid.innerHTML = '<p>Error loading centers. Please try again later.</p>';
    }
}

// Call the function to display cards when the page loads
displayCards();