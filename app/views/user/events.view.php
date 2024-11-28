<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter - Events</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/medical/profile/medical-events.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .publish-button{
            background-color: #6A0DAD;
            color: white;
        }
        .publish-button:hover{
            background-color: #470874;
        }
    </style>
</head>

<body class="body page-style-events">
    <!-- Header -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <!-- Sidebar -->
        <?php include("../app/views/components/user/sidebar.php"); ?>

        <div class="content">
            <!-- Events Section -->
            <div class="events-section">
                <h2 class="section-title">Upcoming Events</h2>
                <div class="button">
                    <button class="publish-button"><i class="fas fa-plus"></i> Publish Event</button>

                </div>
    
                <div class="event-card">
                    <div class="event-image">
                        <img src="<?= ROOT ?>/assets/images/events/event1.jpg" alt="Event Image">
                    </div>
                    <div class="event-details">
                        <h3 class="event-title">Animal sterilization camp</h3>
                        <p>Sun, 5th September, 4.00 PM</p>
                        <p>@youth club</p>
                        <p>36/2 Sri lankarama rd -panadura</p>
                        <p class="publish-date">Published on: 2024/05/16</p>
                        <span class="participants">102 participants enrolled</span>
                    </div>
                    <div class="event-actions">
                        <button class="remove-button">Remove</button>
                        <button class="close-button">Close Event</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
