<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Lost_And-Found</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/mypets.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/events.css">
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
    <div class="main-container container">
        <?php include("../app/views/components/user/sidebar.php"); ?>
            
        <div class="user-accounts-section">
            <?php if (!empty($pets)): ?>
                <!-- <div class="topicnbuttons">
                    <button class="action-button fixedsize" style="background-color:#8049fe;" onclick="openPopup()">Register Pet</button>
                </div> -->

                <div class="header-section">
                    <h2>Your Pets</h2> 
                    <button class="add-event fixedsize" onclick="openPopup()">Register Pet</button> <!--style="background-color:#8049fe;" -->
                </div>

                <div class="pets-section">
                    <?php foreach ($pets as $pet): ?>
                        <!-- <div class="pet-container" onclick="selectPet('<?= htmlspecialchars($pet->petid); ?>')"> -->
                            
                        <div class="pet-container" onclick="<?=ROOT?>/userprofile/mypets/Pet?id=<?= htmlspecialchars($pet->petid); ?>')">
                            <img src="<?= !empty($pet->petimg) ? htmlspecialchars($pet->petimg) : ROOT . '/assets/images/pets/catfound.jpg'; ?>" alt="<?= htmlspecialchars($pet->name); ?>" alt="pet image" class="pet-image">
                            <div class="pet-name"><?= htmlspecialchars($pet->name); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Include appointment info -->
                <!-- <div class="appointments-section">
                    <h2>Upcoming medical appointments: </h2>
                    <div class="appointment">
                        <div class="appointment-details">
                            <strong>Vet. Indunil Rajapakse</strong><br>
                            <span class="time"> Time: 4.00 pm</span><br>
                            <span class="time">Date:  Sat, 24th August, 2024</span><br>
                            @ Pet Hospital - Panadura
                        </div>
                        <button class="cancel-button" onclick="cancelAppointment()">Cancel appointment</button>
                    </div>
                    <div class="appointment">
                        <div class="appointment-details">
                            <strong>Vet. Indunil Rajapakse</strong><br>
                            
                            <span class="time"> Time: 4.00 pm</span><br>
                            <span class="time">Date:  Sat, 24th August, 2024</span><br>
                            @ Pet Hospital - Panadura
                        </div>
                        <button class="cancel-button" onclick="cancelAppointment()">Cancel appointment</button>
                    </div>
                </div> -->
                <script>
        function selectPet(petName) {
            alert(`You selected ${petName}`);
        }
        function cancelAppointment() {
            alert('Appointment canceled');
        }
    </script>
            <?php else: ?>
                <div style="display: flex; justify-content: center; align-items: center; height: 50vh;">
                    <p style="text-align: center; font-size: 1.2rem; color: #555;">No pets have been added yet.<br>
                    <button class="add-event fixedsize" onclick="openPopup()">Add your Pet</button></p><br>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <?php include("../app/views/components/footer.php"); ?>
    
</body>

</html>