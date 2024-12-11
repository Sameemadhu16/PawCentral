document.addEventListener('DOMContentLoaded', function() {
    // Get the current hash or default to 'profile'
    const currentPage = window.location.hash.slice(1) || 'profile';
    
    // Update active nav link
    document.querySelectorAll('.nav-link').forEach(link => {
        if (link.dataset.page === currentPage) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });

    // Load the current page
    loadPage(currentPage, window[currentPage + 'Action']);

    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const page = this.dataset.page;
            
            // Update URL hash without triggering a page reload
            window.history.pushState(null, null, `#${page}`);
            
            document.querySelectorAll('.nav-link').forEach(a => a.classList.remove('active'));
            this.classList.add('active');
            loadPage(page, window[page + 'Action']);
        });
    });

    // Handle browser back/forward buttons
    window.addEventListener('popstate', function() {
        const page = window.location.hash.slice(1) || 'profile';
        
        document.querySelectorAll('.nav-link').forEach(link => {
            if (link.dataset.page === page) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
        
        loadPage(page, window[page + 'Action']);
    });
});

//load pages
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

    // Get the base URL from the current window location
    const baseUrl = window.location.origin + '/PawCentral/public';

    fetch(`${baseUrl}/medical-center/dashboard/${page}`, {
        method: 'GET',
        credentials: 'include',
        headers: {
            'Accept': 'text/html'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.text();
    })
    .then(html => {
        if (!html.trim()) {
            throw new Error('Empty response received');
        }

        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        
        // Try to find container content, with fallback options
        const containerContent = doc.querySelector('.container .content-wrapper') || 
                               doc.querySelector('.container') ||
                               doc.querySelector('body > *');
                               
        if (containerContent) {
            pageWindow.innerHTML = containerContent.innerHTML;
            if (callback) {
                callback();
            }
        } else {
            throw new Error('No suitable content found in response');
        }
    })
    .catch(error => {
        console.error("Error loading page:", error);
        pageWindow.innerHTML = `<div class="error-message">Error loading content: ${error.message}</div>`;
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
    const popup = document.getElementById('add-popup-overlay');
    const closeBtn = document.getElementById('add-close-btn');

    //create functionality
    const add_form = document.getElementById('add-vet-form');

    if (addVetBtn && popup && closeBtn && add_form) {
        addVetBtn.addEventListener('click', () => popup.style.display = 'flex');
        closeBtn.addEventListener('click', () => popup.style.display = 'none');

        add_form.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            fetch('http://localhost/PawCentral/public/medical-center/dashboard/veterinarians', {
                method: 'POST',
                body: formData,
                credentials: 'include'
            })
            .then(async response => {
                const text = await response.text();
                try {
                    return JSON.parse(text);
                } catch (e) {
                    console.error('Invalid JSON response:', text);
                    throw new Error('Server returned invalid response. Check server logs for details.');
                }
            })
            .then(data => {
                if (data.status === 'success') {
                    popup.style.display = 'none';
                    add_form.reset();
                    loadPage('veterinarians', veterinariansAction);
                } else {
                    throw new Error(data.message || 'Unknown error occurred');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert(error.message || 'Failed to submit form. Please try again.');
            });
        });
    }

    // Delete functionality
    const deleteBtns = document.querySelectorAll('.delete-btn');
    const deleteModal = document.getElementById('deleteModal');
    const confirmDeleteBtn = document.getElementById('confirmDelete');
    const cancelDeleteBtn = document.getElementById('cancelDelete');
    let currentVetId = null;

    deleteBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            currentVetId = btn.dataset.id;
            deleteModal.style.display = 'flex';
        });
    });

    cancelDeleteBtn.addEventListener('click', () => {
        deleteModal.style.display = 'none';
    });

    confirmDeleteBtn.addEventListener('click', async () => {
        if (!currentVetId) return;

        try {
            const response = await fetch(`http://localhost/PawCentral/public/medical-center/dashboard/veterinarians?id=${currentVetId}`, {
                method: 'DELETE',
                credentials: 'include'
            });
            
            const data = await response.json();
            deleteModal.style.display = 'none';
            loadPage('veterinarians', veterinariansAction);
        } catch (error) {
            console.error('Delete failed:', error);
        }
    });

    //edit functionality
    const editBtns = document.querySelectorAll('.edit-btn');
    const editPopup = document.getElementById('edit-popup-overlay');
    const editForm = document.getElementById('edit-vet-form');
    const editCloseBtn = document.querySelector('#edit-popup-overlay .close-btn');
    let currentEditVetId = null;

    editBtns.forEach(btn => {
        btn.addEventListener('click', async () => {
            console.log(btn.dataset.id);
            currentEditVetId = btn.dataset.id; // Get ID from button's data attribute
            editPopup.style.display = 'flex';

            try {
                // Update this URL to match the route
                const response = await fetch(`http://localhost/PawCentral/public/medical-center/dashboard/veterinarians/edit-vet?id=${currentEditVetId}`, {
                    method: 'GET',
                    credentials: 'include',
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();
                console.log('Received data:', data);

                if (data.status === 'success' && data.vet) {
                    editForm.querySelector('#edit_id').value = currentEditVetId;
                    editForm.querySelector('#vet-name').value = data.vet.name;
                    editForm.querySelector('#vet-experience').value = data.vet.experience;
                    editForm.querySelector('#vet-availability').value = data.vet.availability;
                } else {
                    throw new Error(data.message || 'Failed to load veterinarian data');
                }
            } catch (error) {
                console.error('Error fetching vet data:', error);
                alert('Failed to load veterinarian data. Please try again.');
            }
        });
    });

    if (editCloseBtn) {
        editCloseBtn.addEventListener('click', () => editPopup.style.display = 'none');
    }

    if (editForm) {
        editForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            
            fetch('http://localhost/PawCentral/public/medical-center/dashboard/veterinarians', {
                method: 'POST',
                body: formData,
                credentials: 'include'
            })
            .then(async response => {
                const text = await response.text();
                try {
                    return JSON.parse(text);
                } catch (e) {
                    console.error('Invalid JSON response:', text);
                    throw new Error('Server returned invalid response. Check server logs for details.');
                }
            })
            .then(data => {
                if (data.status === 'success') {
                    editPopup.style.display = 'none';
                    editForm.reset();
                    loadPage('veterinarians', veterinariansAction);
                } else {
                    throw new Error(data.message || 'Unknown error occurred');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert(error.message || 'Failed to update veterinarian. Please try again.');
            });
        });
    }
}