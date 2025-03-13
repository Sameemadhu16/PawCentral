<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Events</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/events.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/event.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        <div class="content">
            <div>
                <h2>Manage Events</h2>

            </div>
            <div class="event-slider">
                <div class="slide-buttons">
                    <button class="slide-button" id="slide-left"><i class="fas fa-chevron-left"></i></button>
                    <button class="slide-button" id="slide-right"><i class="fas fa-chevron-right"></i></button>
                </div>
                <div id="eventList" class="event-list">
                    <?php if (empty($events)) : ?>
                        <p>No events available.</p>
                    <?php else : ?>
                        <?php foreach ($events as $event) : ?>

                            <div class="event-card">
                                <div class="event-card-content">
                                    <img class="event-image" src="<?= htmlspecialchars($event->eventimg) ?>" alt="Event Image">
                                    <div class="event-details">
                                        <h3><?= esc($event->title) ?></h3>
                                        <p><?= esc($event->date) ?></p>
                                        <p><?= esc($event->location) ?></p>
                                        <p><?= esc($event->address) ?></p>
                                        <p class="published-date">Published on: <?= esc($event->created_at) ?></p>
                                        <span class="participants"><?= esc($event->enrolled) ?> / <?= esc($event->max_participants) ?> participants enrolled</span>
                                        <form method="GET" action="<?= ROOT ?>/admin/event_view">
                                            <input type="hidden" name="id" value="<?= esc($event->event_id) ?>">
                                            <div class="event-actions">
                                                <button class="view-more-button">
                                                    <i class="fas fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

            </div>
            <div class="admin-event-details">
                <h2>Event Details</h2>
                <table class="event-details-table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Enrolled Participants</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $event) : ?>
                            <tr onclick="window.location='<?= ROOT ?>/admin/event_view?id=<?= esc($event->event_id) ?>'">
                                <td><?= esc($event->title) ?></td>
                                <td><?= esc($event->date) ?></td>
                                <td><?= esc($event->enrolled) ?> / <?= esc($event->max_participants) ?></td>
                                <td><?= esc($event->status == 'pending' ? 'Pending' : ($event->status == 'approved' ? 'Approved' : ($event->status == 'rejected' ? 'Rejected' : $event->status))) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include("../app/views/components/footer.php"); ?>

    <script>
        const eventList = document.getElementById('eventList');
        const slideLeft = document.getElementById('slide-left');
        const slideRight = document.getElementById('slide-right');

        slideLeft.addEventListener('click', function() {
            eventList.scrollBy({
                left: -eventList.clientWidth / 2,
                behavior: 'smooth'
            });
        });

        slideRight.addEventListener('click', function() {
            eventList.scrollBy({
                left: eventList.clientWidth / 2,
                behavior: 'smooth'
            });
        });
    </script>
</body>


</html>