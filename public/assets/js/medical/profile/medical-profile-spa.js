document.addEventListener('DOMContentLoaded', function() {
    // Get the current hash or default to 'profile'
    const currentPage = window.location.hash.slice(1) || 'profile';
    
    // Get the base URL from the current window location
    const baseUrl = window.location.origin + '/PawCentral/public';

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

    document.querySelectorAll('.nav-link:not(#logout)').forEach(link => {
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

    //logout for sidebar
    setupLogout();
});

//load pages
function loadPage(page, callback) {
    const pageWindow = document.querySelector('.page-window');

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
    console.log("Profile action function called");
    
        // Elements
        const updateButton = document.getElementById('update-profile-btn');
        const changePhotoBtn = document.getElementById('change-photo-btn');
        const popup = document.getElementById('profile-update-popup');
        const closeBtn = document.querySelector('.close-btn');
        const updateForm = document.getElementById('update-profile-form');
        const profilePicInput = document.getElementById('profile_pic');
        const imagePreviewContainer = document.querySelector('.image-preview-container');
        
        // Open popup when update button is clicked - with direct inline click handler
        if (updateButton && popup) {            
            // Remove any existing event listeners (to avoid duplication)
            updateButton.removeEventListener('click', openUpdatePopup);
            
            // Define a named handler function
            function openUpdatePopup() {
                console.log('Update button clicked!');
                window.debugLog?.('Update button clicked!');
                popup.style.display = 'flex';
                return false;
            }
            
            // Add the event listener
            updateButton.addEventListener('click', openUpdatePopup);

        }
        
        // Auto-hide messages after 5 seconds
        const messages = document.querySelectorAll('.message');
        if (messages.length > 0) {
            setTimeout(() => {
                messages.forEach(msg => {
                    msg.style.opacity = '0';
                    setTimeout(() => msg.style.display = 'none', 500);
                });
            }, 5000);
        }
        
        // Clicking on change photo also opens the popup with focus on profile pic input
        if (changePhotoBtn && popup && profilePicInput) {
            changePhotoBtn.addEventListener('click', () => {
                console.log('Change photo clicked');
                popup.style.display = 'flex';
                // Scroll to profile pic input and focus it
                profilePicInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
                setTimeout(() => profilePicInput.focus(), 500);
            });
        }
        
        // Close popup when X is clicked
        if (closeBtn && popup) {
            closeBtn.addEventListener('click', () => {
                popup.style.display = 'none';
            });
        }
        
        // Close popup when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target === popup) {
                popup.style.display = 'none';
            }
        });
        
        // Preview uploaded image
        if (profilePicInput && imagePreviewContainer) {
            profilePicInput.addEventListener('change', function() {
                imagePreviewContainer.innerHTML = ''; // Clear previous previews
                
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = 'Profile Picture Preview';
                        imagePreviewContainer.appendChild(img);
                    };
                    
                    reader.readAsDataURL(this.files[0]);
                }
            });
        }
        
        // Handle form submission
        if (updateForm) {
            updateForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                
                // Log FormData entries to console
                console.log('Form data contents:');
                for (let [key, value] of formData.entries()) {
                    console.log(`${key}: ${value}`);
                }
                
                // Get the base URL from the current window location
                const baseUrl = window.location.origin + '/PawCentral/public';
                
                fetch(`${baseUrl}/medical-center/dashboard/profile/update-profile`, {
                    method: 'POST',
                    body: formData,
                    credentials: 'include'
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    // close the popup and Reload the page to show updated information
                    window.location.reload();
                    popup.style.display = 'none';
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        }
}

function servicesAction() {

    //add service
    const addServiceBtn = document.getElementById('add-service-btn');
    const addPopup = document.getElementById('add-popup-overlay');
    const addCloseBtn = document.getElementById('add-close-btn');
    const addForm = document.getElementById('add-service-form');

    if (addServiceBtn && addPopup && addCloseBtn && addForm) {
        addServiceBtn.addEventListener('click', () => addPopup.style.display='flex');
        addCloseBtn.addEventListener('click', () => addPopup.style.display='none');
        addForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('http://localhost/PawCentral/public/medical-center/dashboard/services', {
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
            }
            )
            .then(data => {
                if (data.status === 'success') {
                    addPopup.style.display = 'none';
                    addForm.reset();
                    loadPage('services', servicesAction);
                }
                else {
                    throw new Error(data.message || 'Unknown error occurred');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert(error.message || 'Failed to submit form. Please try again.');
            }
            );
        });

        // Handle service card click
        const serviceCards = document.querySelectorAll('.service-select-card');
            
        serviceCards.forEach(card => {
            card.addEventListener('click', function() {
                const serviceId = this.getAttribute('data-service-id');
                const checkbox = document.getElementById('service-' + serviceId);
                
                // Toggle selected class
                this.classList.toggle('selected');
                
                // Toggle checkbox state
                checkbox.checked = !checkbox.checked;
            });
        });
    }

    //delete functionality
    const deleteBtns = document.querySelectorAll('.delete-btn');
    const deleteModal = document.getElementById('deleteModal');
    const confirmDeleteBtn = document.getElementById('confirmDelete');
    const cancelDeleteBtn = document.getElementById('cancelDelete');
    
    let currentServiceId = null;

    deleteBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            currentServiceId = btn.dataset.id;
            deleteModal.style.display = 'flex';
        });
    });

    cancelDeleteBtn.addEventListener('click', () => {
        deleteModal.style.display = 'none';
    });

    confirmDeleteBtn.addEventListener('click', async () => {
        if (!currentServiceId) return;

        try {
            const response = await fetch(`http://localhost/PawCentral/public/medical-center/dashboard/services?id=${currentServiceId}`, {
                method: 'DELETE',
                credentials: 'include'
            });
            
            const data = await response.json();
            deleteModal.style.display = 'none';
            loadPage('services', servicesAction);
        } catch (error) {
            console.error('Delete failed:', error);
        }
    });

    console.log('Services panel loaded');

}

function appointmentsAction() {
    console.log('Appointments panel loaded');

    // Set up date navigation
    setupDateNavigation();

    // Set up view medical record buttons (initial setup, will be re-run after data load)
    setupAppointmentButtons();

}

// set up buttons on appointment cards
function setupAppointmentButtons() {
    document.querySelectorAll('.btn-view').forEach(button => {
        // Remove existing listener to prevent duplicates
        button.removeEventListener('click', handleViewMedicalRecord); 
        // Add named listener
        button.addEventListener('click', handleViewMedicalRecord);
    });
    
    document.querySelectorAll('.btn-complete').forEach(button => {
        button.removeEventListener('click', handleCompleteAppointment);
        button.addEventListener('click', handleCompleteAppointment);
    });
    
    document.querySelectorAll('.btn-cancel').forEach(button => {
        button.removeEventListener('click', handleCancelAppointment);
        button.addEventListener('click', handleCancelAppointment);
    });
}

// Named event handlers for appointment buttons
function handleViewMedicalRecord() {
    const petName = this.getAttribute('data-pet-name');
    showMedicalRecord(petName);
}

function handleCompleteAppointment() {
    completeAppointment(this);
}

function handleCancelAppointment() {
    cancelAppointment(this);
}


// Function to remove any existing status span from the card header
function clearStatusSpan(card) {
    const existingStatus = card.querySelector('h2 span.status');
    if (existingStatus) {
        existingStatus.remove();
    }
}

// Function to add a status span to the card header
function addStatusSpan(card, statusText, statusClass) {
    clearStatusSpan(card); // Ensure only one status is shown
    const statusSpan = document.createElement('span');
    statusSpan.className = `status ${statusClass}`;
    statusSpan.innerText = `(${statusText})`;
    card.querySelector('h2').appendChild(statusSpan);
    
}

function completeAppointment(button) {
    console.log('Complete button clicked');
    const card = button.closest('.appointment-card');
    const completeBtn = card.querySelector('.btn-complete');
    const cancelBtn = card.querySelector('.btn-cancel');
    const undoBtn = card.querySelector('.btn-undo');

    addStatusSpan(card, 'Completed', 'completed');
    completeBtn.disabled = true;
    cancelBtn.disabled = true;
    undoBtn.disabled = false;
    undoBtn.style.display = 'block';

    //update status of the appointment in db
    const appointmentId = button.getAttribute('data-appointment-id');
    fetch(`http://localhost/PawCentral/public/medical-center/dashboard/appointments/completeStatus`, { // Removed ID from URL
        method: 'POST',
        credentials: 'include',
        headers: {
            'Content-Type': 'application/json' // Specify content type
        },
        body: JSON.stringify({ id: appointmentId }) // Send ID in the body
    })
    .then(response => {
        if (!response.ok) {
            console.error('Failed to update status to completed');
            // Optionally revert UI changes here if the API call fails
        }else{
            console.log(response);
        }
    })
    .catch(error => {
        console.error('Error during complete appointment:', error);
        // Optionally revert UI changes here
    });
}

function cancelAppointment(button) {
    if (confirm('Are you sure you want to cancel this appointment?')) {
        const card = button.closest('.appointment-card');
        const completeBtn = card.querySelector('.btn-complete');
        const cancelBtn = card.querySelector('.btn-cancel');
        const undoBtn = card.querySelector('.btn-undo');

        addStatusSpan(card, 'Canceled', 'canceled');
        completeBtn.disabled = true;
        cancelBtn.disabled = true;
        undoBtn.disabled = false;
        undoBtn.style.display = 'block';

        const appointmentId = button.getAttribute('data-appointment-id');
        fetch(`http://localhost/PawCentral/public/medical-center/dashboard/appointments/cancelStatus`, { // Removed ID from URL
            method: 'POST',
            credentials: 'include',
            headers: {
                'Content-Type': 'application/json' // Specify content type
            },
            body: JSON.stringify({ id: appointmentId }) // Send ID in the body
        })
        .then(response => {
            if (!response.ok) {
                console.error('Failed to update status to canceled');
                // Optionally revert UI changes here if the API call fails
            }
        })
        .catch(error => {
            console.error('Error during cancel appointment:', error);
            // Optionally revert UI changes here
        });
    }
}

// Renamed from pendingAppointment for clarity
function undoStatusUpdate(button) {
    const card = button.closest('.appointment-card');
    const completeBtn = card.querySelector('.btn-complete');
    const cancelBtn = card.querySelector('.btn-cancel');
    const undoBtn = card.querySelector('.btn-undo');

    addStatusSpan(card, 'Pending', 'pending'); // Or clearStatusSpan(card) if pending has no text
    completeBtn.disabled = false;
    cancelBtn.disabled = false;
    undoBtn.disabled = true;
    undoBtn.style.display = 'none';

    const appointmentId = button.getAttribute('data-appointment-id');
    fetch(`http://localhost/PawCentral/public/medical-center/dashboard/appointments/pendingStatus`, { // Removed ID from URL
        method: 'POST',
        credentials: 'include',
        headers: {
            'Content-Type': 'application/json' // Specify content type
        },
        body: JSON.stringify({ id: appointmentId }) // Send ID in the body
    })
    .then(response => {
        if (!response.ok) {
            console.error('Failed to update status to pending');
            // Optionally revert UI changes here if the API call fails
        }
    })
    .catch(error => {
        console.error('Error during undo status update:', error);
        // Optionally revert UI changes here
    });
}

function setupDateNavigation() {
    const dateButtonsContainer = document.getElementById('date-buttons-container');
    const prevDateBtn = document.getElementById('prev-date');
    const nextDateBtn = document.getElementById('next-date');
    
    if (!dateButtonsContainer || !prevDateBtn || !nextDateBtn) return;
    
    // Start with today's date
    let currentBaseDate = new Date();
    
    // Generate and display date buttons for the current week
    generateDateButtons(currentBaseDate);
    
    // Previous week button
    prevDateBtn.addEventListener('click', () => {
        currentBaseDate.setDate(currentBaseDate.getDate() - 7);
        generateDateButtons(currentBaseDate);
        // After generating new buttons, automatically select and filter the first day of that week
        const firstButton = dateButtonsContainer.querySelector('button');
        if (firstButton) {
            firstButton.click();
        }
    });
    
    // Next week button
    nextDateBtn.addEventListener('click', () => {
        currentBaseDate.setDate(currentBaseDate.getDate() + 7);
        generateDateButtons(currentBaseDate);
        // After generating new buttons, automatically select and filter the first day of that week
        const firstButton = dateButtonsContainer.querySelector('button');
        if (firstButton) {
            firstButton.click(); // Simulate click to select and filter
        }
    });
    
    // Function to generate date buttons for a week
    function generateDateButtons(baseDate) {
        dateButtonsContainer.innerHTML = ''; // Clear existing buttons
        
        const today = new Date();
        
        // Calculate the start of the week (Sunday) for the given baseDate
        const startOfWeek = new Date(baseDate);
        startOfWeek.setDate(baseDate.getDate() - baseDate.getDay()); // Go back to Sunday

        let todayButton = null; // To store reference to today's button if found

        for (let i = 0; i < 7; i++) {
            const date = new Date(startOfWeek);
            date.setDate(startOfWeek.getDate() + i); // Get the date for the current day in the loop
            
            const button = document.createElement('button');
            
            // Format date
            const day = date.getDate();
            const month = date.toLocaleString('default', { month: 'short' });
            
            // Add day of week
            const dayOfWeek = date.toLocaleString('default', { weekday: 'short' });
            
            button.innerHTML = `<span class="day-of-week">${dayOfWeek}</span><br>${month} ${day}`;
            
            // Check if this date is today
            const isToday = date.getTime() === today.getTime();
            if (isToday) {
                button.classList.add('active'); // Mark today as active initially
                todayButton = button; // Store reference
            }
            
            // Store date info as data attribute for easy access
            button.dataset.date = date.toISOString().split('T')[0];
            
            // Add click event to filter appointments by date
            button.addEventListener('click', () => {
                document.querySelectorAll('#date-buttons-container button').forEach(btn => {
                    btn.classList.remove('active');
                });
                button.classList.add('active');
                
                // Filter appointments by selected date
                filterAppointmentsByDate(button.dataset.date);
            });
            
            dateButtonsContainer.appendChild(button);
        }

        // Automatically trigger filter for today if it's in the current view
        if (todayButton) {
            filterAppointmentsByDate(todayButton.dataset.date);
        } else {
            // If today is not in the initially generated week, filter by the first day shown
            const firstButton = dateButtonsContainer.querySelector('button');
            if (firstButton) {
                firstButton.classList.add('active'); // Mark the first button as active
                filterAppointmentsByDate(firstButton.dataset.date);
            }
        }
    }
    
    // Function to filter appointments by selected date
    function filterAppointmentsByDate(selectedDate) {
        console.log(`Fetching appointments for: ${selectedDate}`);
        
        const appointmentsContainer = document.querySelector('.card-container');
        
        // Clear previous dynamic content (cards, errors, loading)
        const existingContent = appointmentsContainer.querySelectorAll('.appointment-card, .error, .loading');
        existingContent.forEach(el => el.remove());
        
        // Show loading indicator
        const loadingMsg = document.createElement('div');
        loadingMsg.className = 'appointment-card loading';
        loadingMsg.innerHTML = '<h2>Loading appointments...</h2>';
        // Append loading message
        appointmentsContainer.appendChild(loadingMsg);
        
        // Make the AJAX request
        fetch(`http://localhost/PawCentral/public/medical-center/dashboard/appointments/appointmentsByDate?date=${selectedDate}`, {
            method: 'GET',
            credentials: 'include',
            headers: {
                'Accept': 'application/json',
                'Cache-Control': 'no-cache'
            }
        })
        .then(async response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            // First convert to text to debug if needed
            const text = await response.text();
            try {
                return JSON.parse(text);
            } catch (e) {
                console.error('Invalid JSON response:', text);
                throw new Error('Server returned invalid JSON response');
            }
        })
        .then(data => {
            // Remove loading message
            const loadingElement = appointmentsContainer.querySelector('.appointment-card.loading');
            if (loadingElement) {
                loadingElement.remove();
            }
            
            if (data.status === 'success') {
                updateAppointmentsDisplay(data.appointments);
            } else {
                throw new Error(data.message || 'Failed to fetch appointments');
            }
        })
        .catch(error => {
            console.error('Error fetching appointments:', error);
            
            // Remove loading message if it exists
            const loadingElement = appointmentsContainer.querySelector('.appointment-card.loading');
            if (loadingElement) {
                loadingElement.remove();
            }
            
            // Display error message
            const errorMsg = document.createElement('div');
            errorMsg.className = 'appointment-card error';
            errorMsg.innerHTML = `
                <h2>Error loading appointments</h2>
                <p>${error.message || 'Please try again later'}</p>
            `;
            // Append error message
            appointmentsContainer.appendChild(errorMsg);
        });
    }
    
    // Function to update appointments display with fetched data
    function updateAppointmentsDisplay(appointments) {
        const appointmentsContainer = document.querySelector('.card-container');
        
        // Remove existing appointment cards and error/loading messages
        const existingContent = appointmentsContainer.querySelectorAll('.appointment-card, .error, .loading');
        existingContent.forEach(el => el.remove());
        
        if (appointments.length === 0) {
            // No appointments for this date
            const noAppointmentsMsg = document.createElement('div');
            noAppointmentsMsg.className = 'appointment-card';
            noAppointmentsMsg.innerHTML = '<h2>No appointments scheduled for this date</h2>';
            // Append the message
            appointmentsContainer.appendChild(noAppointmentsMsg);
        } else {
            // Add new appointment cards
            appointments.forEach(appointment => {
                const card = document.createElement('div');
                card.className = 'appointment-card';
                
                // Capitalize status for display
                const displayStatus = appointment.status.charAt(0).toUpperCase() + appointment.status.slice(1);

                card.innerHTML = `
                    <h2>${appointment.timeslot} - ${appointment.pet_name} <span>(Owner: ${appointment.owner_name})</span> <span class="status ${appointment.status}" style="${appointment.status === 'pending' ? 'display:none;' : ''}">${appointment.status !== 'pending' ? '(' + displayStatus + ')' : ''}</span></h2>
                    <p>Reason: ${appointment.reason || 'Not specified'}</p>
                    <p>Vet: ${appointment.vet_name}</p>
                    <div class="actions">
                        <button class="btn-view" data-pet-name="${appointment.pet_name}" data-pet-id="${appointment.pet_id}">View Medical Record</button>
                        <button class="btn-complete" data-appointment-id="${appointment.appointment_id}">Complete</button>
                        <button class="btn-cancel" data-appointment-id="${appointment.appointment_id}">Cancel</button>
                        <button class="btn-undo" data-appointment-id="${appointment.appointment_id}" style="display:none">Undo</button>
                    </div>
                `;

                const completeBtn = card.querySelector('.btn-complete');
                const cancelBtn = card.querySelector('.btn-cancel');
                const undoBtn = card.querySelector('.btn-undo');
                const medRecordBtn = card.querySelector('.btn-medRecord');

                // Set initial button states based on appointment status
                if (appointment.status === 'completed') {           
                    addStatusSpan(card, 'Completed', 'completed');
                    completeBtn.disabled = true;
                    cancelBtn.disabled = true;
                    undoBtn.disabled = false;
                    undoBtn.style.display = 'block';
                } else if(appointment.status === 'cancel') { // Assuming 'pending' is the other main state
                    addStatusSpan(card, 'Canceled', 'canceled');
                    completeBtn.disabled = true;
                    cancelBtn.disabled = true;
                    undoBtn.disabled = false;
                    undoBtn.style.display = 'block';
                }else{
                    addStatusSpan(card, 'Pending', 'pending'); // Or clearStatusSpan(card) if pending has no text
                    completeBtn.disabled = false;
                    cancelBtn.disabled = false;
                    undoBtn.disabled = true;
                    undoBtn.style.display = 'none';
                }

                // Add event listeners using the updated functions
                completeBtn.addEventListener('click', function() { completeAppointment(this); });
                cancelBtn.addEventListener('click', function() { cancelAppointment(this); });
                undoBtn.addEventListener('click', function() { undoStatusUpdate(this); });

                medRecordBtn.addEventListener('click', function() {handleViewMedicalRecord(this);});


                // Append the card
                appointmentsContainer.appendChild(card);
            });
        }
    }
}

//veterinarian dashboard 
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
    let currentServiceId = null;

    deleteBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            currentServiceId = btn.dataset.id;
            deleteModal.style.display = 'flex';
        });
    });

    cancelDeleteBtn.addEventListener('click', () => {
        deleteModal.style.display = 'none';
    });

    confirmDeleteBtn.addEventListener('click', async () => {
        if (!currentServiceId) return;

        try {
            const response = await fetch(`http://localhost/PawCentral/public/medical-center/dashboard/veterinarians?id=${currentServiceId}`, {
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

// Add logout handler as a reusable function
function setupLogout() {
    const logoutNav = document.getElementById('logout');
    if (logoutNav) {
        logoutNav.addEventListener('click', function(e) {
            e.preventDefault();
            
            const baseUrl = window.location.origin + '/PawCentral/public';
            fetch(`${baseUrl}/logout`, {
                method: 'POST',
                credentials: 'include',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.status === 'success') {
                    window.location.href = `${baseUrl}/login`;
                } else {
                    throw new Error(data.message || 'Logout failed');
                }
            })
            .catch(error => {
                console.error('Logout failed:', error);
                alert('Logout failed. Please try again.');
            });
        });
    }
}