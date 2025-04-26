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

    <style>
        /* #PendingDiv, #CompletedDiv {
            display: none;
        } */
        .inv-container {
            max-height: 0;
            overflow: auto;
            transition: max-height .5s ease;
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        /* When active */
        .inv-container.active {
            max-height: 270px;
            /* Large enough to show the full content */
        }

        .active-btn {
            background-color: var(--button-normal-hover) !important;
        }
    </style>
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container container">
        <?php include("../app/views/components/shelter/sidebar.php"); ?>

        <div class="user-accounts-section">
            <div class="events-sec">
                <?php if (!empty($events)): ?>
                    <!-- <div class="topicnbuttons">
                    <button class="add-event fixedsize"  onclick="openPopup()">Add Event</button>
                    </div> -->

                    <div class="header-section">
                        <h2>Your Events</h2>
                        <button class="add-event fixedsize" onclick="window.location.href='<?= ROOT ?>/shelter/enrolled_events'">See Enrolled Events</button>
                        <button class="add-event fixedsize" onclick="openPopup()">Add Event</button>
                    </div>
                    <div class="event-list">
                        <?php
                        $hasOngoing = false;
                        foreach ($events as $event) :
                            if ($event->status == 0 & $event->approved == 1):
                                $hasOngoing = true;
                        ?>
                                <div class="event-card">
                                    <div class="event-card-content">
                                        <img class="event-image" src="<?= htmlspecialchars($event->eventimg) ?>" alt="Event Image">
                                        <div class="event-details">
                                            <h3 class="hide_overflow"><?= htmlspecialchars($event->title) ?></h3>
                                            <p><?= htmlspecialchars($event->date) ?></p>
                                            <p><?= htmlspecialchars($event->location) ?></p>
                                            <p class="hide_overflow"><?= htmlspecialchars($event->address) ?></p>
                                            <p class="published-date">Published on: <?= htmlspecialchars($event->created_at) ?></p>
                                            <span class="participants"><?= htmlspecialchars($event->enrolled) ?> / <?= htmlspecialchars($event->max_participants) ?> participants enrolled</span>
                                        </div>
                                        <div class="event-actions">
                                            <button class="close-event" onclick="showPopup(<?= htmlspecialchars($event->event_id) ?>, '<?= ROOT ?>/shelter/event/closeevent?id=<?= htmlspecialchars($event->event_id) ?>','Are you sure want to close this event?<br><br><?= htmlspecialchars($event->title) ?>')">Close event</button>
                                            <form action="<?= ROOT ?>/events/download_enrollments" method="post">
                                                <input type="hidden" name="event_id" value="<?= $event->event_id ?>">
                                                <input type="hidden" name="event_name" value="<?= htmlspecialchars($event->title) ?>">
                                                <button type="submit" class="don-button fixedsize">Participants</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach;
                        if (!$hasOngoing):
                        ?>
                            <div style="text-align: center; padding: 2rem; color: #777;">
                                You have no ongoing events published at the moment.
                            </div>
                        <?php endif; ?>
                    </div>
                <?php else: ?>

                    <div style="display: flex; justify-content: center; align-items: center; padding: 2rem;">
                        <button class="add-event fixedsize" onclick="window.location.href='<?= ROOT ?>/userprofile/enrolled_events'">See Events You Are Enrolled In</button>
                    </div>
                    <hr style="border: none; height: 1.1px; background-color: #6200ef; margin: 1rem 0;">
                    <div style="display: flex; justify-content: center; align-items: center; height: 50vh;">
                        <p style="text-align: center; font-size: 1.2rem; color: #555;">You have no added events yet.<br>
                            <button class="add-event fixedsize" onclick="openPopup()">Add New Event</button>
                        </p><br>
                    </div>

                <?php endif; ?>


                <br><br>

                <?php if (!empty($events)): ?>
                    <button id="PendingDivButton" class="quick-action-button fixedsize" onclick="openPendingDiv()">Pending Approval</button>

                    <button id="CompletedDivButton" class="quick-action-button fixedsize" onclick="openCompletedDiv()">Completed</button>

                    <div id="PendingDiv" class="event-list inv-container">
                        <?php
                        $hasPending = false;
                        foreach ($events as $event) :
                            if ($event->status == 0 && $event->approved == 0) :
                                $hasPending = true;
                        ?>
                                <div class="event-card">
                                    <div class="event-card-content">
                                        <img class="event-image" src="<?= htmlspecialchars($event->eventimg) ?>" alt="Event Image">
                                        <div class="event-details">
                                            <h3 class="hide_overflow"><?= htmlspecialchars($event->title) ?></h3>
                                            <p><?= htmlspecialchars($event->date) ?></p>
                                            <p><?= htmlspecialchars($event->location) ?></p>
                                            <p class="hide_overflow"><?= htmlspecialchars($event->address) ?></p>
                                            <p class="published-date">Published on: <?= htmlspecialchars($event->created_at) ?></p>
                                            <span class="participants"><?= htmlspecialchars($event->enrolled) ?> / <?= htmlspecialchars($event->max_participants) ?> participants enrolled</span>
                                        </div>
                                        <div class="event-actions">
                                            <button class="close-event" onclick="showPopup(<?= htmlspecialchars($event->event_id) ?>, '<?= ROOT ?>/shelter/event/closeevent?id=<?= htmlspecialchars($event->event_id) ?>','Are you sure want to abort this event request?<br><br><?= htmlspecialchars($event->title) ?>', reasons=['Mistaken Entry','Cancelled','No longer Valid','Filled up from other Sources'])">Abort event</button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach;
                        if (!$hasPending) :
                        ?>
                            <div style="text-align: center; padding: 2rem; color: #777;">
                                You have no pending events at the moment.
                            </div>
                        <?php endif; ?>
                    </div>
                    <br>
                    <div id="CompletedDiv" class="event-list inv-container">
                        <?php
                        $hasCompleted = false;
                        foreach ($events as $event) :
                            if ($event->status == 1 && $event->approved == 1) :
                                $hasCompleted = true;
                        ?>
                                <div class="event-card">
                                    <div class="event-card-content">
                                        <img class="event-image" src="<?= htmlspecialchars($event->eventimg) ?>" alt="Event Image">
                                        <div class="event-details">
                                            <h3 class="hide_overflow"><?= htmlspecialchars($event->title) ?></h3>
                                            <p><?= htmlspecialchars($event->date) ?></p>
                                            <p><?= htmlspecialchars($event->location) ?></p>
                                            <p class="hide_overflow"><?= htmlspecialchars($event->address) ?></p>
                                            <p class="published-date">Published on: <?= htmlspecialchars($event->created_at) ?></p>
                                            <span class="participants"><?= htmlspecialchars($event->enrolled) ?> / <?= htmlspecialchars($event->max_participants) ?> participants enrolled<p style="font-size: 0.7rem;">Closing Reason: <?= htmlspecialchars($event->closing_reason) ?></p></span>
                                        </div>
                                        <div class="event-actions">
                                            <!-- <p>closing reason: <?= htmlspecialchars($event->closing_reason) ?></p> -->
                                            <!-- <button class="close-event" ><?= htmlspecialchars($event->closing_reason) ?></button> -->
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach;
                        if (!$hasCompleted) :
                        ?>
                            <div style="text-align: center; padding: 2rem; color: #777;">
                                You have no completed events yet.
                            </div>
                        <?php endif; ?>
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
            <form id="petForm" action="<?= ROOT ?>/shelter/event/addevent" method="POST" enctype="multipart/form-data">
                <label for="title">Event Title:</label>
                <input type="text" id="title" name="title" eventuired>

                <label for="eventimg">Upload a cover photo:</label>
                <input type="file" id="eventimg" name="photos[]" accept="image/*" eventuired>
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
                <input type="date" id="date" name="date" eventuired>

                <label for="location">Location:</label>
                <input type="text" id="location" name="location" placeholder="City/Town" eventuired>

                <label for="time">Event Time:</label>
                <input type="time" id="time" name="time">

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" eventuired>

                <label for="participants">Max Participants allowed:</label>
                <input type="number" id="participants" name="participants" min="2" max="800" eventuired>

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
Preeventuisits if there are any.
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

        function toggleDiv(divId) {
            const pending = document.getElementById("PendingDiv");
            const completed = document.getElementById("CompletedDiv");
            const target = document.getElementById(divId);
            const pendingBtn = document.getElementById("PendingDivButton");
            const completedBtn = document.getElementById("CompletedDivButton");

            // Hide both first
            pending.classList.remove("active");
            completed.classList.remove("active");
            pendingBtn.classList.remove("active-btn");
            completedBtn.classList.remove("active-btn");

            // Toggle the selected one if it wasn't already active
            if (target !== null && !target.classList.contains("active")) {
                target.classList.add("active");
            }

            if (divId == "PendingDiv") {
                pendingBtn.classList.add("active-btn");
            } else if (divId == "CompletedDiv") {
                completedBtn.classList.add("active-btn");
            }
        }

        function openPendingDiv() {
            toggleDiv("PendingDiv");
        }

        function openCompletedDiv() {
            toggleDiv("CompletedDiv");
        }
    </script>

    <script src="<?= ROOT ?>/assets/js/popupform.js"></script>
</body>

</html>