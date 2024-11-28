<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$services = [
    [
        'id' => 1,
        'name' => 'Routine Check-up',
        'description' => 'Comprehensive physical examination including weight check, temperature, heart and lung assessment, and overall health evaluation.',
    ],
    [
        'id' => 2,
        'name' => 'Vaccination',
        'description' => 'Essential vaccines for dogs and cats including rabies, distemper, parvovirus, and more. Customized vaccination schedules for your pet.',
    ],
    [
        'id' => 3,
        'name' => 'Dental Cleaning',
        'description' => 'Professional dental cleaning, scaling, and polishing to maintain your pet\'s oral health and prevent dental diseases.',
    ],
    [
        'id' => 4,
        'name' => 'Surgery',
        'description' => 'Various surgical procedures including spaying/neutering, tumor removal, and other necessary operations.',
    ],
    [
        'id' => 5,
        'name' => 'Laboratory Tests',
        'description' => 'Blood work, urinalysis, fecal examination, and other diagnostic tests to assess your pet\'s health status.',
    ],
    [
        'id' => 6,
        'name' => 'Emergency Care',
        'description' => '24/7 emergency veterinary services for critical care and urgent medical attention.',
    ]
];
?>
<!DOCTYPE html>
<html lang="en" class="page-style-services">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <div class="content-wrapper"> 
            <div class="add-button-div">
                <button class="add-service-btn" id="add-service-btn">Add a service</button>
            </div>
            <?php //include("../app/views/medi.f/profile/popup/add-service.view.php"); ?>
            <!-- responds -->
            <?php if (isset($success_message)): ?>
                <div class="success-message"><?= $success_message ?></div>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <div class="error-message"><?= $error ?></div>
            <?php endif; ?>
            <div class="service-cards">
                <?php foreach($services as $service): ?>
                    <div class="service-card">
                        <h3 class="service-title"><?= $service['name'] ?></h3>
                        <p class="service-description"><?= $service['description'] ?></p>
                        <div class="buttons-div">
                            <button class="edit-btn" data-id="<?= $service['id'] ?>">Edit</button>
                            <button class="delete-btn" data-id="<?= $service['id'] ?>">Delete</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php include("../app/views/components/deleteConfirmation.php"); ?>
        </div>
    </div>
</body>
</html>