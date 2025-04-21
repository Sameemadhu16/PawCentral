class Calendar {
    constructor() {
        this.currentDate = new Date();
        this.visibleDates = 7; // Number of dates visible at once
        this.startIndex = 0;
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
            this.availableDays = JSON.parse(calendarContainer.dataset.availableDays || '[0,1,2,3,4,5,6]');
            const timeRange = JSON.parse(calendarContainer.dataset.timeRange || '{"start": 8, "end": 17}');
            
            // Fix the time range if end is less than start (assuming 24-hour format)
            this.timeRange = {
                start: timeRange.start,
                end: timeRange.end < timeRange.start ? timeRange.end + 12 : timeRange.end
            };
            

        } catch (error) {
            console.error('Error parsing calendar data:', error);
            this.availableDays = [0, 1, 2, 3, 4, 5, 6]; // Fallback
            this.timeRange = { start: 8, end: 17 }; // Fallback
        }
 
        this.initializeCalendar();
        this.addEventListeners();
        this.calculateVisibleDates();
        this.renderTimeSlots();
        window.addEventListener('resize', () => this.calculateVisibleDates());
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
            
            // Check if this date is in the past
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

            // Only add click event to available dates
            if (isAvailable && !isPast) {
                dateElement.addEventListener('click', () => {
                    this.selectDate(dateElement, date);
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
        sessionStorage.setItem('selectedAppointmentDate', date.toISOString().split('T')[0]);
        
        // Show the time slots section
        const timeSection = document.querySelector('.select-time');
        if (timeSection) {
            timeSection.style.display = 'block';
        }
        
        // Update time slots visibility based on selected day
        this.renderTimeSlots();
    }

    renderTimeSlots() {
        // First ensure the timeSlotsContainer exists
        this.timeSlotsContainer = document.querySelector('.time-slots');
        
        if (!this.timeSlotsContainer) {
            console.error("Time slots container not found in the DOM");
            return;
        }
        
        console.log("Found time slots container:", this.timeSlotsContainer);
        console.log("Rendering time slots with range:", this.timeRange);
        this.timeSlotsContainer.innerHTML = '';
        
        // Generate time slots from start to end time
        for (let hour = this.timeRange.start; hour < this.timeRange.end; hour++) {
            // Create AM slots
            if (hour < 12) {
                this.createTimeSlot(`${hour}:00 AM`);
                this.createTimeSlot(`${hour}:30 AM`);
            }
            // Create PM slots
            else {
                const pmHour = hour === 12 ? 12 : hour - 12;
                this.createTimeSlot(`${pmHour}:00 PM`);
                this.createTimeSlot(`${pmHour}:30 PM`);
            }
        }
        
        console.log("Time slots created:", this.timeSlotsContainer.children.length);
    }

    createTimeSlot(timeText) {
        const timeSlot = document.createElement('div');
        timeSlot.className = 'one-time';
        
        // Add a paragraph element to ensure text is displayed properly
        const textElement = document.createElement('p');
        textElement.textContent = timeText;
        timeSlot.appendChild(textElement);
        
        timeSlot.addEventListener('click', function() {
            selectTimeSlot(this);
        });
        
        this.timeSlotsContainer.appendChild(timeSlot);
        
        // Debug: Log the created time slot
        console.log("Created time slot:", timeText);
    }

    calculateVisibleDates() {
        const containerWidth = this.datesContainer.offsetWidth;
        const dateWidth = 100; // date width + gap
        this.visibleDates = Math.floor(containerWidth / dateWidth);
        this.renderDates();
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new Calendar();
    
    // Add event listener to the next button to validate selection
    const nextButton = document.querySelector('.next-form');
    if (nextButton) {
        nextButton.addEventListener('click', function(e) {
            const selectedDate = document.querySelector('.one-date.selected');
            const selectedTimeSlots = document.querySelectorAll('.one-time.selected');
            
            if (!selectedDate) {
                e.preventDefault();
                alert('Please select a date for your appointment');
                return;
            }
            
            if (selectedTimeSlots.length === 0) {
                e.preventDefault();
                alert('Please select a time slot');
                return;
            }
            
            // Use the getSelectedTimeSlots function to get selected time slots
            const selectedTimes = getSelectedTimeSlots();
            sessionStorage.setItem('selectedAppointmentTimes', JSON.stringify(selectedTimes));
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