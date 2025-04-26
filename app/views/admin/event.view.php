<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Events</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/events.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/event.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        <div class="content">
            <div class="dashboard-header">
                <h2>Manage Events</h2>
            </div>

            <div class="dashboard-cards">
                <div class="dashboard-card pending-events">
                    <h3>Pending Events</h3>
                    <div id="eventList" class="event-list">
                        <?php if (empty($events)) : ?>
                            <p class="no-events">No pending events available.</p>
                        <?php else : ?>
                            <?php foreach ($events as $event) : ?>
                                <div class="event-card">
                                    <div class="event-card-content">
                                        <img class="event-image" src="<?= htmlspecialchars($event->eventimg) ?>" alt="Event Image">
                                        <div class="event-details">
                                            <h3><?= esc($event->title) ?></h3>
                                            <div class="event-info">
                                                <p><i class="far fa-calendar-alt"></i> <?= esc($event->date) ?></p>
                                                <p><i class="fas fa-map-marker-alt"></i> <?= esc($event->location) ?></p>
                                                <p><i class="fas fa-map"></i> <?= esc($event->address) ?></p>
                                                <p class="published-date"><i class="far fa-clock"></i> Published on: <?= esc($event->created_at) ?></p>
                                            </div>
                                            <span class="participants"><i class="fas fa-users"></i> <?= esc($event->enrolled) ?> / <?= esc($event->max_participants) ?> participants enrolled</span>
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
            </div>

            <div class="dashboard-card all-events">
                <h3>All Events</h3>
                <div class="table-responsive">
                    <table class="event-details-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Enrolled Participants</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allEvents as $event) : ?>
                                <tr>
                                    <td><?= esc($event->title) ?></td>
                                    <td><?= esc($event->date) ?></td>
                                    <td>
                                        <div class="progress-container">
                                            <div class="progress-bar" style="width: <?= ($event->enrolled / $event->max_participants) * 100 ?>%"></div>
                                            <span class="progress-text"><?= esc($event->enrolled) ?> / <?= esc($event->max_participants) ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-badge status-<?= strtolower($event->status == 0 ? 'pending' : ($event->status == 1 ? 'approved' : 'rejected')) ?>">
                                            <?= esc($event->status == 0 ? 'Pending' : ($event->status == 1 ? 'Approved' : 'Rejected')) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="<?= ROOT ?>/admin/event_view?id=<?= esc($event->event_id) ?>" class="action-button">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>