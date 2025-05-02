class Calendar {
    constructor() {
        this.currentDate = new Date();
        // Initialize startIndex to today's date (0-based)
        this.startIndex = this.currentDate.getDate() - 1;
        this.visibleDates = 7; // Number of dates visible at once
        this.monthElement = document.querySelector('.current-month');
        this.datesContainer = document.getElementById('datesContainer');
        this.prevButton = document.getElementById('prevMonth');
        this.nextButton = document.getElementById('nextMonth');
        this.prevDateButton = document.getElementById('prevDate');
        this.nextDateButton = document.getElementById('nextDate');
        this.timeSlotsContainer = document.querySelector('.time-slots');
        
        // Get the container element with data attributes
        const calendarContainer = document.getElementById('calendar-container');
        
        // Get the available days from data attributes
        try {
            let parsedDays = JSON.parse(calendarContainer.dataset.availableDays || '[0,1,2,3,4,5,6]');
            
            // Handle case where parsedDays is an object with numeric keys (like {0: 1, 1: 2, 2: 3})
            // This converts it to a proper array of values 
            if (!Array.isArray(parsedDays)) {
                console.log('Parsed availableDays is not an array:', parsedDays);
                // Extract values from the object and create a new array
                if (typeof parsedDays === 'object' && parsedDays !== null) {
                    parsedDays = Object.values(parsedDays);
                    console.log('Converted to array:', parsedDays);
                } else {
                    parsedDays = [0, 1, 2, 3, 4, 5, 6]; // Fallback to default
                }
            }
            
            this.availableDays = parsedDays;

            const timeRange = JSON.parse(calendarContainer.dataset.timeRange || '{"start": 8, "end": 17}');
            
            // Fix the time range if end is less than start (assuming 24-hour format)
            this.timeRange = {
                start: timeRange.start,
                end: timeRange.end < timeRange.start ? timeRange.end + 12 : timeRange.end
            };
            const med_id = JSON.parse(calendarContainer.dataset.medId);
            if (!med_id) {
                console.error('Medical ID not found in data attributes:', calendarContainer.dataset.medId);    
                return;
            }
            console.log('Medical ID:', med_id);
            // Store the medical ID in a global variable
            window.med_id = med_id;

        } catch (error) {
            console.error('Error parsing calendar data:', error);
            this.availableDays = [0, 1, 2, 3, 4, 5, 6]; // Fallback
            this.timeRange = { start: 8, end: 17 }; // Fallback
            this.medicalId = 1; // Fallback
            window.med_id = this.medicalId;
        }
 
        this.initializeCalendar();
        this.addEventListeners();
        this.calculateVisibleDates();
        this.renderTimeSlots();
        window.addEventListener('resize', () => this.calculateVisibleDates());

        // Automatically select today's date if it's in the visible range and available
        this.selectTodayIfAvailable();
    }

    initializeCalendar() {
        this.renderDates();
        this.updateMonthDisplay();
        this.updateDateNavigation();
    }

    addEventListeners() {
        this.prevButton.addEventListener('click', () => this.changeMonth(-1));
        this.nextButton.addEventListener('click', () => this.changeMonth(1));
        this.prevDateButton.addEventListener('click', () => this.shiftDates(-1));
        this.nextDateButton.addEventListener('click', () => this.shiftDates(1));
    }

    shiftDates(direction) {
        const daysInMonth = this.getDaysInMonth();
        this.startIndex += direction;
        
        // Ensure startIndex stays within bounds
        if (this.startIndex < 0) {
            this.startIndex = 0;
        } else if (this.startIndex > daysInMonth - this.visibleDates) {
            this.startIndex = daysInMonth - this.visibleDates;
        }
        
        this.renderDates();
        this.updateDateNavigation();
    }

    updateDateNavigation() {
        const daysInMonth = this.getDaysInMonth();
        this.prevDateButton.style.display = this.startIndex <= 0 ? 'none' : 'flex';
        this.nextDateButton.style.display = 
            this.startIndex >= daysInMonth - this.visibleDates ? 'none' : 'flex';
    }

    getDaysInMonth() {
        return new Date(
            this.currentDate.getFullYear(),
            this.currentDate.getMonth() + 1,
            0
        ).getDate();
    }

    changeMonth(delta) {
        this.currentDate.setMonth(this.currentDate.getMonth() + delta);
        this.startIndex = 0;
        this.renderDates();
        this.updateMonthDisplay();
        this.updateDateNavigation();
    }

    updateMonthDisplay() {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 
                       'July', 'August', 'September', 'October', 'November', 'December'];
        this.monthElement.textContent = `${months[this.currentDate.getMonth()]} ${this.currentDate.getFullYear()}`;
    }

    renderDates() {
        this.datesContainer.innerHTML = '';
        const days = ['SUN', 'MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT'];
        
        for (let i = this.startIndex; i < this.startIndex + this.visibleDates; i++) {
            // Skip if we're beyond the current month
            if (i >= this.getDaysInMonth()) break;
            
            const date = new Date(
                this.currentDate.getFullYear(),
                this.currentDate.getMonth(),
                i + 1
            );
            
            // Check if this day of the week is available
            const dayOfWeek = date.getDay(); // 0 = Sunday, 1 = Monday, etc.
            const isAvailable = this.availableDays.includes(dayOfWeek);
            
            // Check if this date is in the past (before today)
            const isPast = date < new Date(new Date().setHours(0, 0, 0, 0));
            
            const dateElement = document.createElement('div');
            dateElement.className = 'one-date';
            
            // Add unavailable class if date is not available or in the past
            if (!isAvailable || isPast) {
                dateElement.classList.add('unavailable');
            }
            
            dateElement.innerHTML = `
                <p class="day">${days[date.getDay()]}</p>
                <p class="date">${i + 1}</p>
            `;

            // Format date manually to avoid timezone issues
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            const formattedDate = `${year}-${month}-${day}`;
            
            // Store the properly formatted date as a data attribute
            dateElement.dataset.date = formattedDate;

            // Only add click event to available dates
            if (isAvailable && !isPast) {
                dateElement.addEventListener('click', () => {
                    this.selectDate(dateElement, dateElement.dataset.date);
                });
            }
            
            this.datesContainer.appendChild(dateElement);
        }
    }

    selectDate(element, date) {
        document.querySelectorAll('.one-date').forEach(date => {
            date.classList.remove('selected');
        });
        element.classList.add('selected');
        
        // Store the selected date in sessionStorage
        sessionStorage.setItem('selectedAppointmentDate', date);
        console.log("Selected date:", date);
        // Show the time slots section
        const timeSection = document.querySelector('.select-time');
        if (timeSection) {
            timeSection.style.display = 'block';
        }
        
        // Update time slots visibility based on selected day
        this.renderTimeSlots(sessionStorage.getItem('selectedAppointmentDate'));
    }

    renderTimeSlots(date) {
        // First ensure the timeSlotsContainer exists
        this.timeSlotsContainer = document.querySelector('.time-slots');
        
        if (!this.timeSlotsContainer) {
            console.error("Time slots container not found in the DOM");
            return;
        }
        
        console.log("Found time slots container:", this.timeSlotsContainer);
        console.log("Rendering time slots with range:", this.timeRange);
        this.timeSlotsContainer.innerHTML = '';
        
        //get booked times from the server
        const med_id = window.med_id; // Use the global variable
        if (!med_id) {
            console.error('Medical ID not found in data attributes:', calendarContainer.dataset.med_id);    
            return;
        }
        console.log('Medical ID:', med_id);
        let bookedTimes = [];
        // Fetch booked times from the server
        fetch('http://localhost/PawCentral/public/medical-appointment-date-times', {
            method: 'POST',
            headers: {  
                'Content-Type': 'application/json'
            },
            //format the date to YYYY-MM-DD
            body: JSON.stringify({ date: sessionStorage.getItem('selectedAppointmentDate'), med_id: med_id })
        })
        .then(response => response.json())
        .then(data => {
            bookedTimes=data.bookedTimes;
            console.log("Booked time slots:", bookedTimes);
            // Generate time slots from start to end time
            for (let hour = this.timeRange.start; hour < this.timeRange.end; hour++) {
                // Create AM slots
                if (hour < 12) {
                    this.createTimeSlot(`${hour}:00 AM`, bookedTimes);
                    this.createTimeSlot(`${hour}:30 AM`, bookedTimes);
                }
                // Create PM slots
                else {
                    const pmHour = hour === 12 ? 12 : hour - 12;
                    this.createTimeSlot(`${pmHour}:00 PM`, bookedTimes);
                    this.createTimeSlot(`${pmHour}:30 PM`, bookedTimes);
                }
            }
        })
        .catch(error => {
            console.error("Error fetching booked time slots:", error);
        });


        
        
        console.log("Time slots created:", this.timeSlotsContainer.children.length);
    }

    createTimeSlot(timeText, bookedTimes) {
        const timeSlot = document.createElement('div');
        timeSlot.className = 'one-time';
        
        // Add a paragraph element to ensure text is displayed properly
        const textElement = document.createElement('p');
        textElement.textContent = timeText;
        timeSlot.appendChild(textElement);
        
        this.timeSlotsContainer.appendChild(timeSlot);

        // Check if the timeText is in bookedTimes array of objects
        const isBooked = bookedTimes.some(item => item.timeslot === timeText);
        
        if (isBooked) {
            timeSlot.classList.add('unavailable');
            timeSlot.classList.remove('selected');
        } else {
            timeSlot.classList.remove('unavailable');
        }

        timeSlot.addEventListener('click', () => {
            if (!timeSlot.classList.contains('unavailable')) {
                selectTimeSlot(timeSlot);
            }
        });
        
        // Debug: Log the created time slot
        console.log("Created time slot:", timeText);
    }

    calculateVisibleDates() {
        const containerWidth = this.datesContainer.offsetWidth;
        const dateWidth = 100; // date width + gap
        this.visibleDates = Math.floor(containerWidth / dateWidth);
        this.renderDates();
    }

    // New method to select today's date if it's available
    selectTodayIfAvailable() {
        const today = new Date();
        
        // Format today's date using the same method as in renderDates
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        const todayStr = `${year}-${month}-${day}`;
        
        // Look for today's date element by data attribute
        const todayElement = document.querySelector(`.one-date[data-date="${todayStr}"]:not(.unavailable)`);
        
        if (todayElement) {
            console.log("Found today's date, selecting it automatically");
            // Use setTimeout to ensure this runs after rendering is complete
            setTimeout(() => {
                // Pass the formatted date string directly
                this.selectDate(todayElement, todayStr);
            }, 100);
        } else {
            console.log("Today's date not found or not available");
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new Calendar();
    
    // Add event listener to the next button to validate selection and submit the form
    const nextButton = document.getElementById('next-button');
    const appointmentForm = document.getElementById('appointment-date-form');
    const appointmentDateInput = document.getElementById('appointment_date');
    const appointmentTimeInput = document.getElementById('appointment_time');
    
    if (nextButton && appointmentForm) {
        nextButton.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent the default behavior
            
            const selectedDate = document.querySelector('.one-date.selected');
            const selectedTimeSlots = document.querySelectorAll('.one-time.selected');
            
            if (!selectedDate) {
                alert('Please select a date for your appointment');
                return;
            }
            
            if (selectedTimeSlots.length === 0) {
                alert('Please select a time slot');
                return;
            }
            
            // Get the selected date value (day number)
            const selectedDay = selectedDate.querySelector('.date').textContent.trim();
            
            // Get the current month and year from the calendar
            const monthYearText = document.querySelector('.current-month').textContent;
            const [month, year] = monthYearText.split(' ');
            
            // Convert month name to month number (0-based)
            const months = ['January', 'February', 'March', 'April', 'May', 'June', 
                           'July', 'August', 'September', 'October', 'November', 'December'];
            const monthIndex = months.indexOf(month);
            
            // Create a date string in YYYY-MM-DD format
            const formattedDate = `${year}-${String(monthIndex + 1).padStart(2, '0')}-${String(selectedDay).padStart(2, '0')}`;
            
            // Get the selected time
            const selectedTime = getSelectedTimeSlots()[0];
            
            // Set values to hidden input fields
            appointmentDateInput.value = formattedDate;
            appointmentTimeInput.value = selectedTime;
            
            // Submit the form
            appointmentForm.submit();
        });
    }
});

function selectTimeSlot(element) {
    // Get currently selected slots
    const selectedSlots = document.querySelectorAll('.one-time.selected');
    
    // If clicking an already selected slot, just remove its selection
    if (element.classList.contains('selected')) {
        element.classList.remove('selected');
        return;
    }
    
    // If already have 1 slot selected and trying to select a new one, show alert
    if (selectedSlots.length >= 1) {
        alert('You can only select one time slot at a time.');
        element.classList.remove('selected');
        return;
    }
    
    // Add selected class to clicked time slot
    element.classList.add('selected');
}

// Helper function to get selected time slots
function getSelectedTimeSlots() {
    const selectedSlots = document.querySelectorAll('.one-time.selected');
    return Array.from(selectedSlots).map(slot => slot.textContent.trim());
}