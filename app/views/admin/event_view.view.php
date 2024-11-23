<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Info</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/event_view.css">
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <div class="event-container">
            <div class="back-icon">
                <a href="<?= ROOT ?>/admin/event">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            <h1>Event Info</h1>

            <!-- Event Details Section -->
            <div class="event-card">
                <img src="<?= ROOT ?>/assets/images/events_bg.jpg" alt="Event Image" class="event-image">
                <div class="event-details">
                    <h2>Animal Sterilization Camp</h2>
                    <p><strong>Date:</strong> Sun, 5th September, 4:00 PM</p>
                    <p><strong>Location:</strong> Youth Club, 36/2 Sri Lankarama Rd - Panadura</p>
                    <p><strong>Published on:</strong> 2024-09-05</p>
                </div>
                <div class="event-actions">
                    <button class="approve-btn" onclick="approveEvent()">Approve</button>
                    <button class="delete-btn" onclick="deleteEvent()">Delete</button>
                </div>
            </div>

            <!-- Event Description -->
            <div class="event-description">
                <h3>Description</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet, urna at viverra facilisis, lorem nunc auctor odio, et feugiat lacus magna vitae libero. Integer porttitor dignissim est, non sollicitudin velit suscipit sed. Curabitur luctus volutpat metus, id accumsan lacus vehicula ut. Proin malesuada, purus vel fermentum interdum, justo sapien bibendum magna, ac pharetra arcu enim in mi.
                </p>
            </div>
        </div>
    </div>

    <script>
        // Function to handle event approval
        function approveEvent() {
            if (confirm("Are you sure you want to approve this event?")) {
                alert("Event approved successfully!");
                // Add backend API call logic here if needed
            }
        }

        // Function to handle event deletion
        function deleteEvent() {
            if (confirm("Are you sure you want to delete this event?")) {
                alert("Event deleted successfully!");
                // Add backend API call logic here if needed
            }
        }
    </script>
</body>

</html>