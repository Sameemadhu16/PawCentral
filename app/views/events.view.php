<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events & Campaigns</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/events.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/pagination.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/index.css">

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/events.css">
</head>
<body>
    
<?php include("../app/views/components/header.php"); ?>

    <div class="events-container">
        <div class="events-sec">
            <h1 class="heading">Events & Campaigns</h1>
            <div class="sub-header">
                <!-- <h2>To be held recently</h2> -->
                 <h2></h2>
                <button id="publishEvent" class="btn-primary">publish event</button>
            </div>
            <div id="eventList" class="event-list-view">
                
            <?php foreach ($events as $event) : ?>
                <div class="event-card">
                    <div class="event-card-content">
                        <img class="event-image" src="<?= htmlspecialchars($event->eventimg) ?>" alt="Event Image">
                        <div class="event-details">
                            <h3 class="hide_overflow"><?= htmlspecialchars($event->title) ?></h3>
                            <p><?= htmlspecialchars($event->date) ?></p>
                            <p><?= htmlspecialchars($event->location) ?></p>
                            <p  class="hide_overflow"><?= htmlspecialchars($event->address) ?></p>
                            <!-- <p class="published-date">published on: <?= htmlspecialchars($event->created_at) ?></p> -->
                            <span class="participants"><?= htmlspecialchars($event->enrolled) ?> / <?= htmlspecialchars($event->max_participants) ?> participants enrolled</span>
                        </div>
                        <div class="event-actions">
                            <button class="find-more-btn" onClick="window.location.href='http://localhost/PawCentral/public/eventsandcampaigns/event?id=<?= htmlspecialchars($event->event_id) ?>'">Find more</button>  <!-- <?= htmlspecialchars($event->event_id) ?> add event id -->
                            <button class="enroll-btn"  onClick="window.location.href='http://localhost/PawCentral/public/eventsandcampaigns/event?id=<?= htmlspecialchars($event->event_id) ?>#register_form'">Enroll</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            </div>
        </div>
        <div class="pagination">
            <button id="prevPage">previous</button>
            <span id="currentPage">1</span>
            <button id="nextPage">next</button>
        </div>
    </div>
    
    <!-- FOOTER -->
    <?php include("../app/views/components/footer.php")?>
    <!-- <script src="./assets/js/events.js"></script> -->

</body>
</html>