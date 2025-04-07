<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Enrollment</title>
  <link rel="stylesheet" href="<?=ROOT?>/assets/css/event-info.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/index.css">
</head>

<body>
    <?php include("../app/views/components/header.php"); ?>

    <div class="container">
        <?php if (!empty($event)): ?>
            <div class="breadcrumb">
                <h1><a href="<?=ROOT?>/eventsandcampaigns">Events & Campaigns</a> / Event Registration</h1>
            </div>
            
            <div class="description">
                <div class="event-header">
                    <?php if (!empty($event->eventimg)): ?>
                        <img src="<?= htmlspecialchars($event->eventimg) ?>" alt="Event Image">
                    <?php else: ?>
                        <img src="<?=ROOT?>/assets/images/pets/default_event.jpg" alt="Default Event Image">
                    <?php endif; ?>
                    <div class="event-details">
                        <h1 id="event-name"><?= htmlspecialchars($event->title ?? '') ?></h2>
                        <p><strong>Date:</strong> <span id="event-date">
                            <?= date('D, jS F, Y', strtotime($event->date ?? '')) ?>, 
                            <?= htmlspecialchars($event->time ?? '') ?>
                        </span></p>
                        <p><strong>Location:</strong> <span id="event-location">
                            <?= htmlspecialchars($event->location ?? '') ?>, 
                            <?= htmlspecialchars($event->address ?? '') ?>
                        </span></p>
                        
                        <p><strong>Participants Enrolled:</strong> <span>
                            <?= htmlspecialchars($event->enrolled ?? 0) ?>/
                            <?= htmlspecialchars($event->max_participants ?? 0) ?>
                        </span></p>
                        <p><small>Published on: <span id="event-published-on">
                            <?= date('Y-m-d', strtotime($event->created_at ?? '')) ?>
                        </span></small></p>
                    </div>
                </div>

                <h4>Description</h4>
                <p id="event-description"><?= nl2br(htmlspecialchars($event->description ?? '')) ?></p>
            </div>
            
            <hr class="styled-hr">

            <div class="register_form" id="register_form">
                <h3>Get enrolled in the event</h3>
                <form action="#" method="post">
                    <input type="hidden" name="event_id" value="<?= htmlspecialchars($event->event_id ?? '') ?>">
                    
                    <label for="comment">Comment</label>
                    <textarea id="comment" name="comment" rows="4" placeholder="Enter any comments..."></textarea>

                    <label for="contact">Contact</label>
                    <small style="margin-left: 20px;">(enter in the 0********* format.)</small>
                    <input type="tel" id="contact" name="contact" placeholder="Phone number" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>

                    <button type="submit" class="btn">Enroll</button>
                </form>
            </div>
        <?php else: ?>
            <div class="error-message">
                <h2>Event not found</h2>
                <p>The requested event could not be found or may have been removed.</p>
                <a href="<?=ROOT?>/eventsandcampaigns" class="btn">Back to Events</a>
            </div>
        <?php endif; ?>
    </div>
  
    <!-- FOOTER -->
    <?php include("../app/views/components/footer.php")?>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const hash = window.location.hash;
            if (hash === '#register_form') {
                const enrollSection = document.querySelector(hash);
                if (enrollSection) {
                    enrollSection.scrollIntoView({ behavior: 'smooth' });
                }
            }
        });
    </script>
</body>
</html>