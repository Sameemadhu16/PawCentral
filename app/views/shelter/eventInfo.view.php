<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Dashboard-Publish Event Info</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/shelter/eventInfo.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Header -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <div class="form-container">
            <div class="back-icon">
                <a href="<?= ROOT ?>/shelter/event">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>

            <h2>Publish Event Info</h2>
            <form method="POST" class="event-form">
                <div class="form-group">
                    <label for="event-title">Event Title</label>
                    <input type="text" id="event-title" name="title" placeholder="Enter event title" required>
                </div>

                <div class="form-group">
                    <label for="event-description">Event Description</label>
                    <textarea id="event-description" name="description" rows="5" placeholder="Enter event description" required></textarea>
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" required>
                </div>

                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" id="time" name="time" required>
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" placeholder="Enter event location" required>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" placeholder="Enter event address" required>
                </div>

                <div class="form-group">
                    <label for="max-participants">Max Participants</label>
                    <input type="number" id="max-participants" name="max_participants" placeholder="Enter max participants" required>
                </div>

                <!-- <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" id="contact" name="contact" placeholder="Enter contact details" required>
                </div> -->

                <button type="submit" class="btn-primary submit-button" name="submitEvent">Publish</button>
            </form>
        </div>
    </div>
</body>

</html>