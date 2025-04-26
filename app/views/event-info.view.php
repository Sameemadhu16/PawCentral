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

    <div class="container" style="padding-bottom: 70px;margin:20px auto;padding: 20px;">
        <?php if (!empty($event)): ?>
            <div class="breadcrumb">
                <h1><a href="<?=ROOT?>/eventsandcampaigns">Events & Campaigns</a> / Event Info</h1>
            </div>
            
            <div class="description">
                <div class="event-header">
                    <?php if (!empty($event->eventimg)): ?>
                        <img src="<?= htmlspecialchars($event->eventimg) ?>" alt="Event Image">
                    <?php else: ?>
                        <img src="<?=ROOT?>/assets/images/pets/default_event.jpg" alt="Default Event Image">
                    <?php endif; ?>
                    <div class="event-details" >
                        <h1 id="event-name"><?= htmlspecialchars($event->title ?? '') ?></h2>
                        <p><strong>Date:</strong> <span id="event-date">
                            <?= date('D, jS F, Y', strtotime($event->date ?? '')) ?>
                        </span></p>
                        <p><strong>Time:</strong> <span id="event-date">
                            <?= date('g:i A', strtotime($event->time ?? '')) ?>
                        </span></p>
                        <p><strong>Location:</strong> <span id="event-location">
                            <?= htmlspecialchars($event->location ?? '') ?>, 
                            <?= htmlspecialchars($event->address ?? '') ?>
                        </span></p>
                        
                        <p style="display:inline-block; margin: 0;"><strong>Participants Enrolled:</strong> <span style="white-space: nowrap;"><?= htmlspecialchars($event->enrolled ?? 0) ?>/<?= htmlspecialchars($event->max_participants ?? 0) ?></span></p>
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
                <!-- <form action="#" method="post"> -->
                <form action="<?=ROOT?>/eventsandcampaigns/event/enroll" method="post" id="enrollmentForm" onsubmit="return validateForm()">
                  
                    <input type="hidden" name="event_id" value="<?= htmlspecialchars($event->event_id ?? '') ?>">
                    
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                    
                    <label for="contact">Contact Number</label>
                    <small class="format-hint" style="margin-left: 20px;">(enter in the 0********* format.)</small>
                    <input type="tel" id="contact" name="contact" placeholder="Enter valid contact number" pattern="^0\d{9}$" required>
                    <div class="error-message" id="contactError"></div>

                    <label for="email">Email</label>
                    
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    <?php if(isset($_SESSION)): ?>
                        <small>(  your system registered email will be used for registration  )</small>
                    <?php endif; ?>
                    <label for="comment">Comment</label>
                    <textarea id="comment" name="comment" rows="4" placeholder="Enter any comments..." maxlength="500"></textarea>
                    <small class="char-count">0/500 characters</small>

                    <button type="submit" class="toggleformbtn">Enroll</button>
                </form>
            </div>

    
            <script>
                document.getElementById('comment').addEventListener('input', function() {
                    const maxLength = 500;
                    const currentLength = this.value.length;
                    const charCount = document.querySelector('.char-count');
                    charCount.textContent = `${currentLength}/${maxLength} characters`;
                    
                    if (currentLength > maxLength) {
                        this.value = this.value.substring(0, maxLength);
                    }
                });

                document.getElementById('contact').addEventListener('input', function() {
                    const contactError = document.getElementById('contactError');
                    const pattern = /^0\d{9}$/;
                    
                    if (!pattern.test(this.value)) {
                        contactError.textContent = 'Please enter a valid contact number (0 followed by 9 digits)';
                        contactError.style.display = 'block';
                    } else {
                        contactError.style.display = 'none';
                    }
                });

                 // Email validation
                 document.getElementById('email').addEventListener('input', function() {
                    const emailError = document.getElementById('emailError');
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    
                    if (!emailPattern.test(this.value)) {
                        emailError.textContent = 'Please enter a valid email address';
                        emailError.style.display = 'block';
                    } else {
                        emailError.style.display = 'none';
                    }
                });

                function validateForm() {
                    const contact = document.getElementById('contact');
                    const email = document.getElementById('email');
                    const terms = document.getElementById('terms');
                    let isValid = true;

                    // Contact validation
                    if (!/^0\d{9}$/.test(contact.value)) {
                        document.getElementById('contactError').style.display = 'block';
                        isValid = false;
                    }

                    // Email validation
                    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
                        document.getElementById('emailError').style.display = 'block';
                        isValid = false;
                    }

                    // Terms validation
                    if (!terms.checked) {
                        document.getElementById('termsError').style.display = 'block';
                        isValid = false;
                    }

                    if (!isValid) {
                        // Scroll to the first error
                        const firstError = document.querySelector('.error-message[style*="display: block"]');
                        if (firstError) {
                            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                        return false;
                    }

                    return true;
                }

            </script>
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