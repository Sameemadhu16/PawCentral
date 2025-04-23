<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Records</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/mypets.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/profile.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>
    
    <div class="main-container container">
        <?php include("../app/views/components/user/sidebar.php"); ?>
        
        <div class="user-accounts-section">
            <div class="profile-section">
                <h1>Medical Records - <?= strtoupper(htmlspecialchars($pet->name)) ?></h1>
                
                <?php if (!empty($medical_records)): ?>
                    <?php foreach ($medical_records as $record): ?>
                        <div class="med-record">
                            <h2>
                                <?= htmlspecialchars($record->visit_type) ?>
                                <span class="record-date">
                                    <i class="far fa-calendar-alt"></i>
                                    <?= date('M d, Y', strtotime($record->visit_date)) ?>
                                </span>
                            </h2>
                            
                            <div class="record-details">
                                <div class="record-item">
                                    <span class="record-label">Veterinarian</span>
                                    <span class="record-value"><?= htmlspecialchars($record->vet_name) ?></span>
                                </div>
                                
                                <div class="record-item">
                                    <span class="record-label">Diagnosis</span>
                                    <span class="record-value"><?= htmlspecialchars($record->diagnosis) ?></span>
                                </div>
                                
                                <div class="record-item">
                                    <span class="record-label">Treatment</span>
                                    <span class="record-value"><?= htmlspecialchars($record->treatment) ?></span>
                                </div>
                                
                                <div class="record-item">
                                    <span class="record-label">Weight</span>
                                    <span class="record-value"><?= htmlspecialchars($record->weight) ?> kg</span>
                                </div>
                                
                                <div class="record-notes">
                                    <span class="record-label">Notes</span>
                                    <span class="record-value"><?= htmlspecialchars($record->notes) ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="med-record">
                        <h2>No Medical Records Found</h2>
                        <div class="record-details">
                            <p>No medical records have been added for this pet yet.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include("../app/views/components/footer.php"); ?>
</body>

</html> 