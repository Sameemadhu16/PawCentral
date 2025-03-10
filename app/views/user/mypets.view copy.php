<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Lost_And-Found</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/lostFound.css">
    
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <style>
        

        .pets-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 800px;
        }

        .pet-container {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .pet-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

        .pet-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .pet-name {
            font-size: 1.2rem;
            color: #fff;
            padding: 10px 0;
            background: #8049fe;
        }
        .appointments-section {
            margin-top: 20px;
            width: 100%;
            max-width: 800px;
            padding: 20px;
            /* background: #eef2ff; */
            border-radius: 10px;
            /* box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); */
        }

        .appointment {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #dbe4ff;
            padding: 15px;
            border-radius: 8px;
            margin-top: 10px;
            box-shadow: 2px 3px 10px rgba(0, 0, 0, 0.1);
        }

        .appointment-details {
            font-size: .9rem;
            color: #111;
        }
        .appointment-details strong{
            font-size: 20px;
            margin-bottom: 10px;
        }
        .time {
            margin-top: 10px;
            color: black;
            font-size: 16px !important;
        }

        .cancel-button {
            background: #D91656;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .cancel-button:hover {
            background: #820e34;
        }
        

    </style>


</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>
    <div class="main-container">
        <?php include("../app/views/components/user/sidebar.php"); ?>
            
            
        <div class="user-accounts-section">
    <div class="topicnbuttons">
        <!-- <button class="action-button fixedsize">Add another post</button> -->
        <button class="action-button fixedsize" style="background-color:#8049fe;" onclick="window.location.href='<?=ROOT?>/lostandfound/report-animal';">Register Pet</button>
    </div>

    <div class="topicnbuttons">
        <h2>Your Pets</h2> 
    </div>

    <?php if (!empty($pets)): ?>
        <?php foreach ($pets as $pet): ?>
            <div class="pet-card" id=<?= htmlspecialchars($pet->petid); ?>>
                <img src=<?=htmlspecialchars($pet->img1)?> alt="nikkhy" class="pet-photo">
                <a class="pet-details" href="<?=ROOT?>/lostandfound/postdetails?id=<?= $pet->petid ?>">
                    <div class="details">
                        <h3><?= htmlspecialchars($pet->petName); ?> - <?= htmlspecialchars($pet->breed); ?></h3>
                        <p><?= htmlspecialchars($pet->status); ?></p>
                        <p><?= htmlspecialchars($pet->address); ?> - <?= htmlspecialchars($pet->location); ?></p>
                        <p class="date">Reported on: <?= htmlspecialchars($pet->publishedOn); ?></p>
                    </div>
                </a>
                <div class="buttons">
                    <form action="<?= ROOT ?>/lostandfound/edit?id=<?= htmlspecialchars($pet->petid) ?>" method="POST" style="display: inline;">
                        <button class="action-button">Update info</button>
                    </form>
                    <form action="<?= ROOT ?>/lostandfound/marklostnfound?id=<?= htmlspecialchars($pet->petid) ?>" method="POST" style="display: inline;">
                        <button type="submit" class="action-button">Mark Complete</button>
                    </form>
                    <!-- <button class="action-button">Mark complete</button> -->
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No pets found.</p>
        <div class="pets-section">
        <!-- Pet 1 -->
        <div class="pet-container" onclick="selectPet('Pet 1')">
            <img src="<?=ROOT?>/assets/images/pets/catfound.jpg" alt="Pet 1" class="pet-image">
            <div class="pet-name">Lamey</div>
        </div>

        <!-- Pet 2 -->
        <div class="pet-container" onclick="selectPet('Pet 2')">
            <img src="<?=ROOT?>/assets/images/pets/pet1.webp" alt="Pet 2" class="pet-image">
            <div class="pet-name">Nikkie</div>
        </div>

        <!-- Additional pets can be added here -->
    </div>
    <div class="appointments-section">
        <h2>Upcoming medical appointments:</h2>
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
    </div>

    <script>
        function selectPet(petName) {
            alert(`You selected ${petName}`);
        }
        function cancelAppointment() {
            alert('Appointment canceled');
        }
    </script>

    <?php endif; ?>
</div>
    </div>
    
    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>