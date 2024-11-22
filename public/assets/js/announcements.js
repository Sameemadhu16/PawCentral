// Local data array
const announcements = [
    {
        id: 1,
        title: "New Pet Food Line",
        date: "2024/07/20",
        time: "10:20 pm",
        content: "We're excited to announce our new organic pet food line, coming next month!"
    },
    {
        id: 2,
        title: "Pet Adoption Event",
        date: "2024/07/21",
        time: "09:00 am",
        content: "Join us this weekend for our annual pet adoption event. Find your new furry friend! orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
    },
    {
        id: 3,
        title: "Grooming Services Discount",
        date: "2024/07/22",
        time: "02:30 pm",
        content: "Get 20% off all grooming services this week. Book your appointment now!"
    },
    {
        id: 4,
        title: "New Veterinarian Joining",
        date: "2024/07/23",
        time: "11:45 am",
        content: "We're pleased to welcome Dr. Smith to our veterinary team. She specializes in exotic pets.orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
    },
    {
        id: 5,
        title: "Pet Training Classes",
        date: "2024/07/24",
        time: "03:15 pm",
        content: "New series of pet training classes starting next month. Early bird discounts available!"
    }
];

let currentPage = 1;
const announcementsPerPage = 4;

function changePage(direction) {
    const newPage = currentPage + direction;
    const totalPages = Math.ceil(announcements.length / announcementsPerPage);
    if (newPage > 0 && newPage <= totalPages) {
        currentPage = newPage;
        displayAnnouncements();
    }
}

function displayAnnouncements() {
    const startIndex = (currentPage - 1) * announcementsPerPage;
    const endIndex = startIndex + announcementsPerPage;
    const pageAnnouncements = announcements.slice(startIndex, endIndex);

    const container = document.getElementById('announcements');
    container.innerHTML = '';
    pageAnnouncements.forEach(announcement => {
        container.innerHTML += `
            <div class="announcement">
                <h2>${announcement.title}</h2>
                <div class="meta">Date: ${announcement.date} | Time: ${announcement.time}</div>
                <p>${announcement.content}</p>
            </div>
        `;
    });

    updatePagination();
}

function updatePagination() {
    const totalPages = Math.ceil(announcements.length / announcementsPerPage);
    document.getElementById('currentPage').textContent = currentPage;
    document.getElementById('prevPage').disabled = currentPage === 1;
    document.getElementById('nextPage').disabled = currentPage === totalPages;
}

// Initial display
displayAnnouncements();