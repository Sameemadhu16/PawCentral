// Select all the sidebar links
const links = document.querySelectorAll(".sidebar li a");

// Add event listener to each link
links.forEach(link => {
    link.addEventListener('click', (event) => {
        // Remove 'active' class from all links
        links.forEach(link => {
            link.classList.remove('active');
        });

        // Add 'active' class to the clicked link
        link.classList.add('active');
    });

    // Check if the link href matches the current page URL
    if (link.href === window.location.href) {
        link.classList.add('active');
    }
});

// Add sidebar toggle functionality
const sidebar = document.getElementById('sidebar');
const toggleButton = document.createElement('button');
toggleButton.className = 'sidebar-toggle';
toggleButton.innerHTML = '<i class="fas fa-bars"></i>';

sidebar.appendChild(toggleButton);

toggleButton.addEventListener('click', () => {
    sidebar.classList.toggle('active');
});

// Close sidebar when clicking outside
document.addEventListener('click', (event) => {
    if (!sidebar.contains(event.target) && sidebar.classList.contains('active')) {
        sidebar.classList.remove('active');
    }
});
