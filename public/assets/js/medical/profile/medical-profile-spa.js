document.addEventListener('DOMContentLoaded', function() {
    loadPage('profile', profileAction);

    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const page = this.dataset.page;
            document.querySelectorAll('.nav-link').forEach(a => a.classList.remove('active'));
            this.classList.add('active');
            loadPage(page, window[page + 'Action']);
        });
    });
});

function loadPage(page, callback) {
    const pageWindow = document.querySelector('.page-window');
    if (!pageWindow) {
        console.error('Page window element not found');
        return;
    }

    // Remove any existing page-specific classes
    const existingClasses = Array.from(pageWindow.classList);
    existingClasses.forEach(className => {
        if (className.startsWith('page-style-')) {
            pageWindow.classList.remove(className);
        }
    });

    // Add the new page-specific class
    pageWindow.classList.add(`page-style-${page}`);

    fetch(`http://localhost/PawCentral/public/medical-center/dashboard/${page}`)
        .then(response => response.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            
            const containerContent = doc.querySelector('.container');
            if (containerContent) {
                // const sidebar = containerContent.querySelector('.sidebar');
                // if (sidebar) {
                //     sidebar.remove();
                // }
                pageWindow.innerHTML = containerContent.innerHTML;
                
                // Execute panel-specific actions if provided
                if (callback) {
                    callback();
                }
            } else {
                pageWindow.innerHTML = '<p>Content not found</p>';
            }
        })
        .catch(error => {
            console.error("Error loading page:", error);
            pageWindow.innerHTML = 'Error loading content';
        });
}

// Panel-specific action functions
function profileAction() {

    console.log('Profile panel loaded');
}

function appointmentsAction() {

    console.log('Appointments panel loaded');
}

function veterinariansAction() {
    console.log('vet panel loaded');
    const addVetBtn = document.getElementById('add-vet-btn');
    const popup = document.querySelector('.popup-overlay');
    const closeBtn = document.querySelector('.close-btn');
    const form = document.getElementById('add-vet-form');

    if (addVetBtn && popup && closeBtn && form) {
        addVetBtn.addEventListener('click', function() {
            console.log('clicked add vet');
            popup.style.display = 'flex';
        });

        closeBtn.addEventListener('click', function() {
            popup.style.display = 'none';
        });

        

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your form submission logic here
            popup.style.display = 'none';
        });
    }
}

