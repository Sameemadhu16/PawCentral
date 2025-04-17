<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter - Events</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/events.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/popup.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>

<body class="body">
    <?php include("../app/views/components/header.php");

    ?>

    <div class="main-container container">
        <?php include("../app/views/components/user/sidebar.php");

        ?>

        <div class="user-accounts-section">
            <div class="events-sec">
                <?php if (!empty($events)): ?>
                    <div class="topicnbuttons">
                        <button class="add-event fixedsize" onclick="openPopup()">Add Event</button>
                    </div>

                    <div class="topicnbuttons">
                        <h2>Your Published Events</h2>
                    </div>
                    <div class="event-list">
                        <?php foreach ($events as $event) : ?>
                            <div class="event-card">
                                <div class="event-card-content">
                                    <img class="event-image" src="<?= htmlspecialchars($event->eventimg) ?>" alt="Event Image">
                                    <div class="event-details">
                                        <div class="title-status-row">
                                            <h3 class="hide_overflow"><?= htmlspecialchars($event->title) ?></h3>
                                            <span class="event-status 
                                                <?= $event->status === 0 ? 'status-pending' : ($event->status === 1 ? 'status-approved' : ($event->status === 2 ? 'status-rejected' : 'status-closed')) ?>">
                                                <?= $event->status === 0 ? 'Pending' : ($event->status === 1 ? 'Approved' : ($event->status === 2 ? 'Rejected' : 'Closed')) ?>
                                            </span>
                                        </div>
                                        <p><?= htmlspecialchars($event->date) ?></p>
                                        <p><?= htmlspecialchars($event->location) ?></p>
                                        <p class="hide_overflow"><?= htmlspecialchars($event->address) ?></p>
                                        <p class="published-date">Published on: <?= htmlspecialchars($event->created_at) ?></p>
                                        <span class="participants"><?= htmlspecialchars($event->enrolled) ?> / <?= htmlspecialchars($event->max_participants) ?> participants enrolled</span>
                                    </div>
                                    <div class="event-actions">
                                        <button class="close-event" onclick="showPopup(<?= htmlspecialchars($event->event_id) ?>, '<?= ROOT ?>/userprofile/event/closeevent?id=<?= htmlspecialchars($event->event_id) ?>','Are you sure want to close this event?<br><br><?= htmlspecialchars($event->title) ?>')">Close event</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div style="display: flex; justify-content: center; align-items: center; height: 50vh;">
                        <p style="text-align: center; font-size: 1.2rem; color: #555;">You have no added events yet.<br>
                            <button class="add-event fixedsize" onclick="openPopup()">Add New Event</button>
                        </p><br>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


    <!-- ADD EVENT FORM -->
    <div id="popupForm" class="popup-container">
        <div class="form-container">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <h2>Enter Event Information</h2>
            <form id="petForm" action="<?= ROOT ?>/userprofile/event/addevent" method="POST" enctype="multipart/form-data">
                <label for="title">Event Title:</label>
                <input type="text" id="title" name="title" required>

                <label for="eventimg">Upload a cover photo:</label>
                <input type="file" id="eventimg" name="photos[]" accept="image/*" required>
                <div id="imagePreviewContainer"></div>
                <script>
                    document.getElementById('eventimg').addEventListener('change', function() {
                        const maxFiles = 1;
                        const fileInput = this;

                        if (fileInput.files.length > maxFiles) {
                            feedback.style.display = 'block';
                            fileInput.value = ''; // Clear the input
                        } else {
                            feedback.style.display = 'none';
                        }
                    });

                    document.getElementById('eventimg').addEventListener('change', function() {
                        const previewContainer = document.getElementById('imagePreviewContainer');
                        previewContainer.innerHTML = ''; // Clear existing previews

                        Array.from(this.files).forEach(file => {
                            if (file.type.startsWith('image/')) {
                                const img = document.createElement('img');
                                img.src = URL.createObjectURL(file);
                                // img.style.width = '100px';
                                // img.style.margin = '5px';
                                previewContainer.appendChild(img);
                            }
                        });
                    });
                </script>

                <label for="date">Event Date:</label>
                <input type="date" id="date" name="date" required>

                <label for="location">Location:</label>
                <input type="text" id="location" name="location" placeholder="City/Town" required>

                <label for="time">Event Time:</label>
                <input type="time" id="time" name="time">

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>

                <label for="participants">Max Participants allowed:</label>
                <input type="number" id="participants" name="participants" min="2" max="800" required>

                <script>
                    document.querySelector('form').addEventListener('submit', function(event) {
                        const age = document.getElementById('date').value;
                        const participants = document.getElementById('participants').value;

                        // Validate date
                        const Date = new Date(document.getElementById('date').value);
                        const today = new Date();
                        if (Date > today) {
                            alert('Event date cannot be in the future.');
                            event.preventDefault(); // Prevent form submission
                        }

                        // Validate participant amount
                        if (participants < 2 || participants > 800) {
                            alert('Atleast 2 participants must be allowed to participate');
                            event.preventDefault(); // Prevent form submission
                            return;
                        }
                        // Validate time
                    });
                </script>

                <label for="eventdesc">Add a description for the event:</label>
                <textarea id="desc" name="desc" rows="7" placeholder="Describe specifics about the event,
Prerequisits if there are any.
or any other information that participants should be aware of."></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <?php include("../app/views/components/footer.php"); ?>
    <!-- JS & component includes -->
    <script>
        function openPopup() {
            document.getElementById("popupForm").style.display = "flex";
            document.body.style.overflow = "hidden"; // Disable scrolling
        }

        function closePopup() {
            document.getElementById("popupForm").style.display = "none";
            document.body.style.overflow = "auto"; // Enable scrolling
        }
    </script>
    <script src="<?= ROOT ?>/assets/js/popupform.js"></script>
</body>

</html>