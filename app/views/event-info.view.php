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

    <script>
        const event_info = {
            eventName: "Animal Sterilization Camp",
            eventDate: "Sun, 5th September, 4:00 PM",
            eventLocation:"Youth Club, 36/2 Sri Inakaranama Rd - Panadura",
            publishedDate:"2024-09-05",
            description:"Lorem ipsum dolor sit amet, consectetur adipiscing elit...\n\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC<br><br> making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of 'de Finibus Bonorum et Malorum' (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, Lorem ipsum dolor sit amet.., comes from a line in section 1.10.32.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from 'de Finibus Bonorum et Malorum' by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham."
        };
        
        // Wait until the DOM is fully loaded before accessing elements
        document.addEventListener("DOMContentLoaded", () => {
            // Set event name and date dynamically
            document.getElementById("event-name").textContent = event_info.eventName;
            document.getElementById("event-date").textContent = event_info.eventDate;
            document.getElementById("event-location").textContent = event_info.eventLocation;
            document.getElementById("event-published-on").textContent = event_info.publishedDate;
            
            document.getElementById("event-description").innerHTML = event_info.description.replace(/\n/g,"<br>");
        });
    </script>

    <div class="container">
        
    <div class="breadcrumb">
        <h1><a href="<?=ROOT?>/eventsandcampaigns">Events & Campaigns</a> / register</h1>
    </div>
    
    <div class="description">
        <div class="event-header">
            <img src="<?=ROOT?>/assets/images/pets/bambi_1.jpg" alt="Event Image">
            <div class="event-details">
                <h2 id="event-name"></h2>
                <p><strong>Date:</strong> <span id="event-date"></span></p>
                <p><strong>Location:</strong> <span id="event-location"></span></p>
                <p><small>Published on: <span id="event-published-on"></span></small></p>
            </div>
        </div>

        <h4>Description</h4>
        <p id="event-description"></p>
    </div>
    
    <hr class="styled-hr">

    <div class="register_form" id="register_form">
    <h3>Get enrolled in the event</h3>
    <form action="#" method="post" >
      <label for="name">Your Name</label>
      <input type="text" id="name" name="name" placeholder="Enter your name" required>

      <label for="age">Age</label>
      <input type="number" id="age" name="age" placeholder="Enter your age" required>

      <label for="option1">Option 1</label>
      <input type="text" id="option1" name="option1">

      <label for="option2">Option 2</label>
      <input type="text" id="option2" name="option2">

      <label for="comment">Comment</label>
      <textarea id="comment" name="comment" rows="4" placeholder="Enter any comments..."></textarea>

      <label for="contact">Contact</label>
      
      <small style="margin-left: 20px;">(enter in the 0********* format.)</small>
      <!-- Auth Phone number!! -->
      <input type="tel" id="contact" name="contact" placeholder="Phone number" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required>

      <button type="submit" class="btn">Enroll</button>
    </form>
</div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
        const hash = window.location.hash;
        if (hash === '#register_form') {
            const enrollSection = document.querySelector(hash);
            if (enrollSection) {
                // Smooth scroll to the enroll form
                enrollSection.scrollIntoView({ behavior: 'smooth' });
            }
        }
    });

  </script>
</body>
</html>
