<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter - Events</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/shelter/events.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Header -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <!-- Sidebar -->
        <?php include("../app/views/components/shelter/sidebar.php"); ?>

        <div class="content">
            <!-- Events Section -->
            <div class="events-section">
                <!-- <h2>Events</h2> -->
                <div class="button">
                    <form action="<?= ROOT ?>/shelter/eventInfo" method="post">
                        <button type="submit" class="publish-button">Publish Event</button>
                    </form>
                </div>



                <div class="event-card">
                    <div class="event-image">
                        <img src="<?= ROOT ?>/assets/images/events_bg.jpg" alt="Event Image">
                    </div>
                    <div class="event-details">
                        <h3>Pet Adoption Fair</h3>
                        <p>Sat, 12th August, 10.00 AM</p>
                        <p>@Central Park</p>
                        <p>125 Main Street, Colombo</p>
                        <p class="publish-date">Published on: 2024/03/22</p>
                        <span class="participants">78 participants enrolled</span>
                    </div>
                    <div class="event-actions">
                        <button class="close-button">Close Event</button>
                    </div>
                </div>

                <div class="event-card">
                    <div class="event-image">
                        <img src="<?= ROOT ?>/assets/images/pets/4.jpg" alt="Event Image">
                    </div>
                    <div class="event-details">
                        <h3>Vaccination Drive</h3>
                        <p>Tue, 15th October, 2.00 PM</p>
                        <p>@Animal Wellness Center</p>
                        <p>45 Lake Road, Kandy</p>
                        <p class="publish-date">Published on: 2024/07/18</p>
                        <span class="participants">125 participants enrolled</span>
                    </div>
                    <div class="event-actions">
                        <button class="close-button">Close Event</button>
                    </div>
                </div>

                <div class="event-card">
                    <div class="event-image">
                        <img src="<?= ROOT ?>/assets/images/pets/1.jpg" alt="Event Image">
                    </div>
                    <div class="event-details">
                        <h3>Charity Dog Walk</h3>
                        <p>Sun, 20th November, 8.00 AM</p>
                        <p>@City Square</p>
                        <p>10 Union Avenue, Galle</p>
                        <p class="publish-date">Published on: 2024/08/12</p>
                        <span class="participants">64 participants enrolled</span>
                    </div>
                    <div class="event-actions">
                        <button class="close-button">Close Event</button>
                    </div>
                </div>

                <div class="event-card">
                    <div class="event-image">
                        <img src="<?= ROOT ?>/assets/images/pets/3.jpg" alt="Event Image">
                    </div>
                    <div class="event-details">
                        <h3>Pet Training Workshop</h3>
                        <p>Mon, 7th December, 3.00 PM</p>
                        <p>@Downtown Community Center</p>
                        <p>88 Green Street, Jaffna</p>
                        <p class="publish-date">Published on: 2024/09/05</p>
                        <span class="participants">54 participants enrolled</span>
                    </div>
                    <div class="event-actions">
                        <button class="close-button">Close Event</button>
                    </div>
                </div>



            </div>

        </div>
    </div>
    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>