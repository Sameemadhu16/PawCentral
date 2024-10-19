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
