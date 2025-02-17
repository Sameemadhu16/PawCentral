<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter - Events</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/events.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">   
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
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <?php include("../app/views/components/user/sidebar.php"); ?>

        <div class="user-accounts-section">
            <div class="events-sec">
                <div class="topicnbuttons">
                    <button class="action-button fixedsize" style="background-color:#8049fe;" onclick="openPopup()">Add Event</button>
                </div>
                
                <div class="topicnbuttons">
                    <h2>Your Published Events</h2>
                </div>
                <div class="event-list">
                    <?php 
                        $events = [
                            ["image" => "events_bg.jpg", "title" => "Pet Adoption Fair", "date" => "Sat, 12th August, 10.00 AM", "location" => "@Central Park", "address" => "125 Main Street, Colombo", "published" => "2024/03/22", "participants" => 78],
                            ["image" => "pets/1.jpg", "title" => "Charity Dog Walk", "date" => "Sun, 20th November, 8.00 AM", "location" => "@City Square", "address" => "10 Union Avenue, Galle", "published" => "2024/08/12", "participants" => 64],
                            ["image" => "pets/3.jpg", "title" => "Pet Training Workshop", "date" => "Mon, 7th December, 3.00 PM", "location" => "@Downtown Community Center", "address" => "88 Green Street, Jaffna", "published" => "2024/09/05", "participants" => 54]
                        ];

                        foreach ($events as $event) : ?>
                            <div class="event-card">
                                    <div class="event-card-content">
                                    <img class="event-image" src="<?= ROOT ?>/assets/images/<?= $event['image'] ?>" alt="Event Image">
                                    <div class="event-details">
                                        <h3><?= $event['title'] ?></h3>
                                        <p><?= $event['date'] ?></p>
                                        <p><?= $event['location'] ?></p>
                                        <p><?= $event['address'] ?></p>
                                        <p class="published-date">Published on: <?= $event['published'] ?></p>
                                        <span class="participants"><?= $event['participants'] ?> participants enrolled</span>
                                    </div>
                                    <div class="event-actions">
                                        <button class="close-event" onClick="window.location.href='http://localhost/PawCentral/public/user/events/closeevent/${event.id}'">Close event</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    

    <!-- ADD EVENT FORM -->
    <div id="popupForm" class="popup-container">
        <div class="form-container">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <h2>Enter Event Information</h2>
            <form id="petForm" action="<?= ROOT ?>/userprofile/events/addevent" method="POST" enctype="multipart/form-data">
                <label for="title">Event Title:</label>
                <input type="text" id="title" name="title" required>

                <label for="eventimg">Upload a cover photo:</label>
                <input type="file" id="eventimg" name="photos[]" accept="image/*" required>
          <div id="imagePreviewContainer"></div>
          <script>
              document.getElementById('eventimg').addEventListener('change', function () {
                const maxFiles = 1;
                const fileInput = this;
                
                if (fileInput.files.length > maxFiles) {
                  feedback.style.display = 'block';
                  fileInput.value = ''; // Clear the input
                } else {
                  feedback.style.display = 'none';
                }
              });

              document.getElementById('eventimg').addEventListener('change', function () {
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
                        document.querySelector('form').addEventListener('submit', function (event) {
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
                        if (participants < 2 || height > 800) {
                            alert('Atleast 2 participants must be allowed to participate');
                            event.preventDefault(); // Prevent form submission
                            return;
                        }
                        // Validate time
                        });
                    </script>

                <label for="health">Add a description for the event:</label>
          <textarea id="desc" name="desc" rows="7" placeholder="Describe specifics about the event,
Prerequisits if there are any.
or any other information that participants should be aware of."></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>

