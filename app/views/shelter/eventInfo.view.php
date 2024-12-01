<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publish Event Info</title>
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
            <form action="#" method="POST" class="event-form">
                <div class="form-group">
                    <label for="event-title">Event Title</label>
                    <input type="text" id="event-title" name="event_title" placeholder="Enter event title" required>
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" required>
                </div>

                <div class="form-group">
                    <label for="venue">Venue</label>
                    <input type="text" id="venue" name="venue" placeholder="Enter event venue" required>
                </div>

                <div class="form-group">
                    <label for="event-type">Event Type</label>
                    <select id="event-type" name="event_type" required>
                        <option value="">Select event type</option>
                        <option value="Workshop">Workshop</option>
                        <option value="Meetup">Meetup</option>
                        <option value="Charity">Charity</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="event-description">Event Description</label>
                    <textarea id="event-description" name="event_description" rows="5"
                        placeholder="Enter event description" required></textarea>
                </div>

                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" id="contact" name="contact" placeholder="Enter contact details" required>
                </div>

                <button type="submit" class="submit-button">Publish</button>
            </form>
        </div>
    </div>
</body>

</html>