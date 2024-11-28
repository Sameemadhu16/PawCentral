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
        
        this.initializeCalendar();
        this.addEventListeners();
        this.calculateVisibleDates();
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
            const date = new Date(
                this.currentDate.getFullYear(),
                this.currentDate.getMonth(),
                i + 1
            );
            
            const dateElement = document.createElement('div');
            dateElement.className = 'one-date';
            dateElement.innerHTML = `
                <p class="day">${days[date.getDay()]}</p>
                <p class="date">${i + 1}</p>
            `;

            dateElement.addEventListener('click', () => this.selectDate(dateElement));
            this.datesContainer.appendChild(dateElement);
        }
    }

    selectDate(element) {
        document.querySelectorAll('.one-date').forEach(date => {
            date.classList.remove('selected');
        });
        element.classList.add('selected');
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
});

function selectTimeSlot(element) {
    // Get currently selected slots
    const selectedSlots = document.querySelectorAll('.one-time.selected');
    
    // If clicking an already selected slot, just remove its selection
    if (element.classList.contains('selected')) {
        element.classList.remove('selected');
        return;
    }
    
    // If already have 2 slots selected and trying to select a new one, show alert
    if (selectedSlots.length >= 2) {
        alert('You can only select up to 2 time slots');
        return;
    }
    
    // Add selected class to clicked time slot
    element.classList.add('selected');
}

// Optional: Add function to get selected time slots
function getSelectedTimeSlots() {
    const selectedSlots = document.querySelectorAll('.one-time.selected');
    return Array.from(selectedSlots).map(slot => slot.textContent.trim());
} 