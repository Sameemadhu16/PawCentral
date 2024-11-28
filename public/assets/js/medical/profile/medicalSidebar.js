const links = document.querySelectorAll(".sidebar li a");

links.forEach(link => {
    link.addEventListener('click', (event) => {
        links.forEach(link => {
            link.classList.remove('active');
        });

        link.classList.add('active');
    });

    // Check if the link href matches the current page URL
    if (link.href === window.location.href) {
        link.classList.add('active');
    }
});

const sidebar = document.getElementById('sidebar');
const toggleButton = document.createElement('button');
toggleButton.className = 'sidebar-toggle';
toggleButton.innerHTML = '<i class="fas fa-bars"></i>';

sidebar.appendChild(toggleButton);

toggleButton.addEventListener('click', () => {
    sidebar.classList.toggle('active');
});

// clicking outside
document.addEventListener('click', (event) => {
    if (!sidebar.contains(event.target) && sidebar.classList.contains('active')) {
        sidebar.classList.remove('active');
    }
});
