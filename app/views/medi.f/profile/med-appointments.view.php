<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en" class="page-style-appointments">
<body>
    <div class="container">
        <div class="header">
        <h1>Veterinary Center Dashboard</h1>
        <p>Total Appointments Today: <?php echo $todayCount; ?> | Upcoming: <?php echo $upcomingCount; ?></p>
        </div>

        <input type="text" placeholder="Search by pet, owner or vet name..." class="search-input">

        <div class="date-nav">
            <button id="prev-date">⟨</button>
            <div id="date-buttons-container">
                <!-- Date buttons will be dynamically inserted here -->
            </div>
            <button id="next-date">⟩</button>
        </div>

        <div class="appointment-card">
        <h2>10:30 AM - Bella <span>(Owner: Sarah Johnson)</span></h2>
        <p>Reason: Annual Vaccination</p>
        <p>Vet: Dr. Lisa Raymond</p>
        <div class="actions">
            <button class="btn-view" data-pet-name="Bella">View Medical Record</button>
            <button class="btn-complete">Complete</button>
            <button class="btn-cancel">Cancel</button>
        </div>
        </div>

        <div class="appointment-card">
        <h2>11:00 AM - Max <span>(Owner: James Lee)</span></h2>
        <p>Reason: Check-up after surgery</p>
        <p>Vet: Dr. Kevin Hart</p>
        <div class="actions">
            <button class="btn-view" data-pet-name="Max">View Medical Record</button>
            <button class="btn-complete">Complete</button>
            <button class="btn-cancel">Cancel</button>
        </div>
        </div>

        <div class="pagination">
        <button>Previous</button>
        <button class="active">1</button>
        <button>2</button>
        <button>3</button>
        <button>Next</button>
        </div>
    </div>
</body>
</html>