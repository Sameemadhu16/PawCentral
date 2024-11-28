<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en" class="page-style-appointments">
<body>
    <div class="container">
        <h2>Appointments</h2>
        <div class="appointments-grid">
            <!-- Sample Appointments -->
            <div class="appointment-card staff-view">
                <div class="appointment-header">
                    <span class="appointment-date">Dec 15, 2023</span>
                    <span class="appointment-time">10:30 AM</span>
                    <span class="appointment-status pending">Pending</span>
                </div>
                <div class="appointment-details">
                    <div class="owner-info">
                        <p><strong>Owner:</strong> John Smith</p>
                        <p><strong>Contact:</strong> (555) 123-4567</p>
                    </div>
                    <div class="pet-info">
                        <p><strong>Pet:</strong> Max</p>
                        <p><strong>Species:</strong> Dog</p>
                        <p><strong>Breed:</strong> Golden Retriever</p>
                        <p><strong>Age:</strong> 5 years</p>
                        <p><strong>Weight:</strong> 30kg</p>
                    </div>
                    <div class="medical-info">
                        <p><strong>Reason:</strong> Annual Checkup</p>
                    </div>
                </div>
                <div class="appointment-actions">
                    <button class="btn-start-appointment">Start Appointment</button>
                    <button class="btn-medical-records">View Records</button>
                    <button class="btn-reschedule">Reschedule</button>
                    <select class="status-update">
                        <option value="confirmed">Confirm</option>
                        <option value="in-progress">In Progress</option>
                        <option value="completed">Complete</option>
                        <option value="no-show">No Show</option>
                    </select>
                </div>
            </div>

            <div class="appointment-card staff-view">
                <div class="appointment-header">
                    <span class="appointment-date">Dec 15, 2023</span>
                    <span class="appointment-time">11:30 AM</span>
                    <span class="appointment-status in-progress">In Progress</span>
                </div>
                <div class="appointment-details">
                    <div class="owner-info">
                        <p><strong>Owner:</strong> John Smith</p>
                        <p><strong>Contact:</strong> (555) 123-4567</p>
                    </div>
                    <div class="pet-info">
                        <p><strong>Pet:</strong> Max</p>
                        <p><strong>Species:</strong> Dog</p>
                        <p><strong>Breed:</strong> Golden Retriever</p>
                        <p><strong>Age:</strong> 5 years</p>
                        <p><strong>Weight:</strong> 30kg</p>
                    </div>
                    <div class="medical-info">
                        <p><strong>Reason:</strong> Annual Checkup</p>
                    </div>
                </div>
                <div class="appointment-actions">
                    <button class="btn-start-appointment">Start Appointment</button>
                    <button class="btn-medical-records">View Records</button>
                    <button class="btn-reschedule">Reschedule</button>
                    <select class="status-update">
                        <option value="confirmed">Confirm</option>
                        <option value="in-progress">In Progress</option>
                        <option value="completed">Complete</option>
                        <option value="no-show">No Show</option>
                    </select>
                </div>
            </div>

            <div class="appointment-card staff-view">
                <div class="appointment-header">
                    <span class="appointment-date">Dec 14, 2023</span>
                    <span class="appointment-time">11:00 AM</span>
                    <span class="appointment-status confirmed">confirm</span>
                </div>
                <div class="appointment-details">
                    <div class="owner-info">
                        <p><strong>Owner:</strong> John Smith</p>
                        <p><strong>Contact:</strong> (555) 123-4567</p>
                    </div>
                    <div class="pet-info">
                        <p><strong>Pet:</strong> Max</p>
                        <p><strong>Species:</strong> Dog</p>
                        <p><strong>Breed:</strong> Golden Retriever</p>
                        <p><strong>Age:</strong> 5 years</p>
                        <p><strong>Weight:</strong> 30kg</p>
                    </div>
                    <div class="medical-info">
                        <p><strong>Reason:</strong> Annual Checkup</p>
                    </div>
                </div>
                <div class="appointment-actions">
                    <button class="btn-start-appointment">Start Appointment</button>
                    <button class="btn-medical-records">View Records</button>
                    <button class="btn-reschedule">Reschedule</button>
                    <select class="status-update">
                        <option value="confirmed">Confirm</option>
                        <option value="in-progress">In Progress</option>
                        <option value="completed">Complete</option>
                        <option value="no-show">No Show</option>
                    </select>
                </div>
            </div>
        </div>

    </div>
</body>
</html>