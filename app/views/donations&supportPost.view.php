
<?php
require_once(__DIR__ . '/../../public/stripe/init.php');  // Relative path to the init.php file
// C:\xampp\htdocs\PawCentral\
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($post->title ?? '') ?></title>
  <link rel="stylesheet" href="<?=ROOT?>/assets/css/event-info.css">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/index.css">
  <link rel="stylesheet" href="<?=ROOT?>/assets/css/main.css">
  <style>
.donation-form {
  max-width: 500px;
  margin: auto;
}

.card-options {
  display: flex;
  gap: 20px;
  margin-bottom: 15px;
}

.card-radio {
  display: flex;
  align-items: center;
  gap: 8px;
  border: 2px solid transparent;
  padding: 5px;
  cursor: pointer;
  transition: 0.2s;
  border-radius: 8px;
}

.card-radio input[type="radio"] {
  display: none;
}

.card-radio img {
  width: 60px;
  height: auto;
  filter: grayscale(100%);
  transition: 0.3s ease;
}

.card-radio:has(input:checked) {
  border-color: var(--button-normal-hover);
}

.card-radio:has(input:checked) img {
  filter: none;
}
  </style>
</head>

<body>
  <?php include("../app/views/components/header.php"); ?>
  <div class="container" style="padding-bottom: 70px;margin:20px auto;padding: 20px;">
    <!-- Donation Request Section -->
    <div class="breadcrumb">
                <h1><a href="<?=ROOT?>/eventsandcampaigns">Donations & Support</a> / Post Info</h1>
            </div>
        

    <?php if (!empty($post)): ?>
        
    
        <div class="description">
                <div class="event-header">
                    <?php if (!empty($post->img)): ?>
                        <img src="<?= htmlspecialchars($post->img) ?>" alt="Event Image">
                    <?php else: ?>
                        <img src="<?=ROOT?>/assets/images/pets/default_event.jpg" alt="Default Event Image">
                    <?php endif; ?>
                    <div class="event-details">
                        <h1 id="event-name"><?= htmlspecialchars($post->title ?? '') ?></h2>
                        <p><strong>Expires On:</strong> <?= date('Y-m-d', strtotime($post->expire_date ?? '')) ?></p>

                        <p><strong>Collected :</strong> <span>
                            <?= htmlspecialchars($post->collected ?? 0) ?>/
                            <?= htmlspecialchars($post->amount ?? 0) ?>
                        </span></p>
                        
                        <p><small>Published on: <span id="event-published-on">
                            <?= date('Y-m-d', strtotime($post->requested_at ?? '')) ?>
                        </span></small></p>
                    </div>
                </div>
                <h4>Why we need your support</h4>
            <p><?= nl2br(htmlspecialchars($post->reason ?? '')) ?></p>

            <h4>More Info</h4>
            <p><?= nl2br(htmlspecialchars($post->info ?? '')) ?></p>
            </div>
            
            <hr class="styled-hr">

<!-- <form action="<?= ROOT ?>/donationsnsupport/create-checkout-session" method="POST">
  <label for="amount">Enter donation amount (LKR):</label>
  <input type="number" name="amount" id="amount" min="200" step="1" required>
  <button type="submit">Donate</button>
</form> -->

<div class="register_form collapsed" id="register_form">
    <!-- <h3>Support this cause :</h3> -->
    <form action="<?= ROOT ?>/donationsnsupport/create-checkout-session" method="post" class="donation-form">
    <input type="hidden" name="id" value="<?= htmlspecialchars($post->id ?? '') ?>">
    <label for="amount">Donation Amount in Rupees (LKR)</label>
    <input type="number" name="amount" id="amount" placeholder="E.g. 525.50" min="200" step="0.01" required>

    <button type="submit" class="toggleformbtn">Donate</button>
</form>
</div>
<button id="toggleFormBtn" class="toggleformbtn">Support This Cause</button>



            <!-- donation form -->

<div class="register_form collapsed" id="register_form">
    <h3>Support this cause :</h3>
    <form action="<?=ROOT?>/donationsnsupport/donate?id=<?=htmlspecialchars($post->id ?? '')?>" method="post" class="donation-form">
    <input type="hidden" name="post_id" value="<?= htmlspecialchars($post->id ?? '') ?>">

    <label>Select Card Type</label>
    <div class="card-options">
        <label class="card-radio">
            <input type="radio" name="card_type" value="Visa" required>
            <img src="<?=ROOT?>/assets/images/logos/visa.png" alt="Visa" />
        </label>
        <label class="card-radio">
            <input type="radio" name="card_type" value="MasterCard" required>
            <img src="<?=ROOT?>/assets/images/logos/mastercard.png" alt="MasterCard" />
        </label>
        <label class="card-radio">
            <input type="radio" name="card_type" value="American Express" required>
            <img src="<?=ROOT?>/assets/images/logos/amex.png" alt="American Express" />
        </label>
    </div>

    <label for="holder">Account Holder Name</label>
    <input type="text" id="holder" name="holder" placeholder="Your full name" required pattern="[A-Za-z\s]+" title="Only letters and spaces allowed">

    <label for="account">Account No. <small>(16 digits on front of card)</small></label>
    <input type="text" id="account" name="account" placeholder="1234 5678 9012 3456" required pattern="\d{16}" maxlength="16" title="Enter exactly 16 digits">

    <label for="vcc">VCC Number <small>(3-digit code on back)</small></label>
    <input type="text" id="vcc" name="vcc" placeholder="123" required pattern="\d{3}" maxlength="3" title="Enter 3-digit VCC">

    <label for="donateAmount">Donation Amount (in Rupees)</label>
    <input type="number" id="donateAmount" name="donateAmount" placeholder="E.g. 525.50" min="10" step="0.01" required>

    <button type="submit" class="toggleformbtn">Donate Now</button>
</form>
</div>
<!-- <button id="toggleFormBtn" class="toggleformbtn">Support This Cause</button> -->


    <?php else: ?>
            <div class="error-message">
                <h2>Event not found</h2>
                <p>The requested event could not be found or may have been removed.</p>
                <a href="<?=ROOT?>/eventsandcampaigns" class="btn">Back to Events</a>
            </div>
        <?php endif; ?>
  </div>

  <?php include("../app/views/components/footer.php")?>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const hash = window.location.hash;
      if (hash && document.querySelector(hash)) {
        document.querySelector(hash).scrollIntoView({ behavior: 'smooth' });
      }
    });
  </script>
</body>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Smooth scroll for hashes
    const hash = window.location.hash;
    if (hash && document.querySelector(hash)) {
      document.querySelector(hash).scrollIntoView({ behavior: 'smooth' });
    }

    // Donation form toggle logic
    const toggleBtn = document.getElementById('toggleFormBtn');
    const registerForm = document.getElementById('register_form');

    toggleBtn.addEventListener('click', () => {
      registerForm.classList.toggle('collapsed');
      registerForm.classList.toggle('expanded');
      toggleBtn.textContent = registerForm.classList.contains('expanded')
        ? 'Cancel'
        : 'Support This Cause';
    });
  });
</script>

</html>
